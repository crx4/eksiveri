<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  protected $data = array();
  protected $langs = array();
  protected $default_lang;
  protected $current_lang;

  function __construct()
  {
    parent::__construct();

    $this->load->model('language_model');
    $available_languages = $this->language_model->get_all();
    if(isset($available_languages))
    {
      foreach($available_languages as $lang)
      {
        $this->langs[$lang->slug] = array('id'=>$lang->id,'slug'=>$lang->slug,'language_directory'=>$lang->language_directory,'language_code'=>$lang->language_code,'default'=>$lang->default);
        if($lang->default == '1') $this->default_lang = $lang->slug;
      }
    }

    $lang_slug = $this->uri->segment(1);
    if(isset($lang_slug) && array_key_exists($lang_slug, $this->langs))
    {
      $this->current_lang = $lang_slug;
      $_SESSION['set_language'] = $lang_slug;
    }

    elseif(isset($_SESSION['set_language']))
    {
      $this->current_lang = $_SESSION['set_language'];
    }

    else
    {
      $this->current_lang = $this->default_lang;
      $_SESSION['set_language'] = $this->default_lang;
    }

    $this->data['langs'] = $this->langs;
    $this->data['current_lang'] = $this->langs[$this->current_lang];

    if($this->current_lang != $this->default_lang)
    {
      $this->data['lang_slug'] = $this->current_lang.'/';
    }
    else
    {
      $this->data['lang_slug'] = '';
    }

    $this->data['page_title'] = 'Eksiveri App';
    $this->data['before_head'] = '';
    $this->data['before_body'] ='';
  }

  protected function render($the_view = NULL, $template = 'master')
  {
    if($template == 'json' || $this->input->is_ajax_request())
    {
      header('Content-Type: application/json');
      echo json_encode($this->data);
    }
    else
    {
      $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);;
      $this->load->view('templates/'.$template.'_view', $this->data);
    }
  }
}

class Admin_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_in())
    {
      redirect('admin/user/login', 'refresh');
    }
    $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['current_user_menu'] = '';
    if($this->ion_auth->in_group('admin'))
    {
      $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin_view.php', NULL, TRUE);
    }
    $this->data['page_title'] = 'Eksiveri App - Dashboard';
  }
  protected function render($the_view = NULL, $template = 'admin_master')
  {
    parent::render($the_view, $template);
  }
}

class Public_Controller extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  }
}

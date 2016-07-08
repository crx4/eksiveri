<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller
{

  function __construct()
  {
    parent::__construct();
    if(!$this->ion_auth->in_group('admin'))
    {
      $this->session->set_flashdata('message','You are not allowed to visit the Pages page');
      redirect('admin','refresh');
    }
    $this->load->model('page_model');
    $this->load->model('page_translation_model');
    $this->load->model('language_model');
    $this->load->library('form_validation');
    $this->load->helper('text');
  }

  public function index()
  {
    //$this->render('admin/pages/index_view');
  }

  public function create($language_slug = NULL, $page_id = 0)
  {
    $language_slug = (isset($language_slug) && array_key_exists($language_slug, $this->langs)) ? $language_slug : $this->current_lang;

    $this->data['content_language'] = $this->langs[$language_slug]['name'];
    $this->data['language_slug'] = $language_slug;
    $page = $this->page_model->get($page_id);
    if($page_id != 0 && $page==FALSE)
    {
      $page_id = 0;
    }
    if($this->page_translation_model->where(array('page_id'=>$page_id,'language_slug'=>$language_slug))->get())
    {
      $this->session->set_flashdata('message', 'A translation for that page already exists.');
      redirect('admin/pages', 'refresh');
    }
    $this->data['page'] = $page;
    $this->data['page_id'] = $page_id;
    $pages = $this->page_model->where('language_slug',$language_slug)->order_by('menu_title')->fields('id,menu_title')->get_all();
    $this->data['parent_pages'] = array('0'=>'No parent page');
    if(!empty($pages))
    {
      foreach($pages as $page)
      {
        $this->data['parent_pages'][$page->id] = $page->menu_title;
      }
    }
  }

  $rules = $this->page_model->rules;
  $this->form_validation->set_rules($rules['insert']);
  if($this->form_validation->run()===FALSE)
  {
    $this->render('admin/pages/create_view');
  }
  else
  {

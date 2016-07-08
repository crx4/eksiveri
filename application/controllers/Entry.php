<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

  public function __construct()
  {
		parent::__construct();
		$this->load->database();
		$this->load->model('Entry_Model');
		$this->load->model('Word_Model');
		$this->load->dbforge();
		$this->load->helpers('url');
  }

	public function initialize()
	{
		$results = $this->Entry_Model->get_chosen_entries();

		$this->Entry_Model->fill_words_table($results);

		redirect('');
	}

		public function update()
		{
			$result = $this->Word_Model->get_chosen_words();

			$this->Entry_Model->update_whole_table($result);

			redirect('');
		}

		public function clear()
		{
			$this->Entry_Model->clear_notr_entries();
			redirect('');
		}

	public function clear_weaks()
	{
		$data['chosen_words'] = $this->Word_Model->get_chosen_words();
		foreach ($data['chosen_words']  as $row)
			$results[] = array( 'id' => $row->id );

		$data['words'] = $this->Word_Model->get_words();

		foreach ($data['words'] as $row)
			if( $this->Entry_Model->clear_weak_entry($row->id, $results) )
				$this->Entry_Model->delete_word_by_id($row->id);

		redirect('');
	}

	public function update_char_lengths()
	{
		$results = $this->Entry_Model->get_chosen_entries();
		foreach ($results  as $row)
			$this->Entry_Model->update_ct_length($row->id, $row->content_text);

		redirect('');
	}
}

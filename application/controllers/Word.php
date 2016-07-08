<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Word extends CI_Controller {

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
		$this->load->model('Word_Model');
		$this->load->model('Entry_Model');
		$this->load->dbforge();
		$this->load->helpers('url');
  }

	public function build()
	{
		$fields = array();
		$results = array();

		$data['chosen_words'] = $this->Word_Model->get_chosen_words();
		foreach ($data['chosen_words']  as $row)
			$results[] = array( 'id' => $row->id );

		foreach ($results as $value)
			$fields[ 'word_'.$value['id'] ] = array('type' => 'INT', 'constraint' => 1, 'default' => 0);

		if($this->Word_Model->add_column_to_cws($fields))
			redirect('');
	}
	public function drop_columns()
	{
		$results = array();

		$data['chosen_words'] = $this->Word_Model->get_chosen_words();
		foreach ($data['chosen_words']  as $row)
			$results[] = array( 'id' => $row->id );

		foreach ($results as $value)
			$this->Word_Model->drop_column_from_cws( 'word_'.$value['id'] );

		redirect('');
	}
	function truncate()
	{
		if($this->Word_Model->truncate_table())
			redirect('');
	}

	public function update_frequencies()
	{
		$data['chosen_entries'] = $this->Entry_Model->get_chosen_entries();

		foreach ($data['chosen_entries']  as $row){
			$entry_words = explode(' ', $row->content_text);
			$entry_words = array_unique($entry_words);

			foreach ($entry_words as $word) {
				if($this->Word_Model->is_adready_inserted($word))
					$this->Word_Model->count_up_word_f($word, $row->analysis);
				else
					$this->Word_Model->insert_word_f($word, $row->analysis);
			}
		}
		redirect('');
	}

	public function truncate_frequencies()
	{
		if($this->Word_Model->truncate_frequencies())
			redirect('');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends My_Controller {

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
	public function index()
	{
		$this->load->database();
		$this->load->helpers('form');
		$this->load->model('Entry_Model');

		$data['total_n'] = $this->Entry_Model->sum_total_length('n');
		$data['count_n'] = $this->Entry_Model->get_count('n');
		$data['total_h'] = $this->Entry_Model->sum_total_length('h');
		$data['count_h'] = $this->Entry_Model->get_count('h');
		$data['total_u'] = $this->Entry_Model->sum_total_length('u');
		$data['count_u'] = $this->Entry_Model->get_count('u');

		$this->load->view('header');
		$this->load->view('welcome', $data);
		$this->load->view('footer');
	}
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends Public_Controller {

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

	protected $entry_source;
	protected $entry = array();

  public function __construct()
  {
		parent::__construct();
		$this->load->database();
		$this->load->model('Word_Model');
		$this->load->library('html_dom');
		$this->load->library('sentiment_analysis');
  }

	public function entryid()
	{
		$words = $this->Word_Model->get_chosen_words();
		$entryId = $this->uri->segment(3);
		$entry_source =  'https://eksisozluk.com/entry/';
		$html = new CI_Html_dom();
		$html->load_file( $entry_source . $entryId );
		
		$entry = array(
										'number' => $entryId,
										'header' => $html->find('h1[.title] a span', 0)->plaintext,
										'headerSource' => $html->find('h1 a', 0)->href,
										'contentText' => $html->find('.content', 0)->plaintext,
										'contentHtml' => $html->find('.content', 0)->outertext,
										'author' => $html->find('.entry-author', 0)->plaintext,
										'authorSource' => $html->find('.entry-author', 0)->href,
										'time' => $html->find('.entry-date', 0)->plaintext,
										'analysis' => $html->find('.entry-date', 0)->plaintext
									);
		//$entry['length'] = strlen($entry['contentText']);
		//$entry['notrPolarWeight']
		//$entry['happyUnhappyWeight']
		
		$entry['contentText'] = $this->sentiment_analysis->preprocessing_text($entry['contentText']);
		
		$this->data['entry'] = $this->sentiment_analysis->sentiment_analysis($entry,$words);

		$this->render($this->data['entry'], 'json');
	}
}

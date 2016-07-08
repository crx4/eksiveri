<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Analyse extends Public_Controller {

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
		$this->load->model('Analyse_Model');
		$entryid =  $this->input->post('entryid');

		$content = file_get_contents('http://eksiveri.com/api/entryid/'.$entryid);
		if ($content === false) {
			redirect('');
		}
		$entry = json_decode($content);
		$entry = $entry->entry;

		$analyseH = 0;
		$analyseN = 0;
		$analyseU = 0;

		if($entry->analysis === 'h')
			$analyseH = 1;
		elseif ($entry->analysis === 'n')
			$analyseN = 1;
		elseif ($entry->analysis === 'u')
			$analyseU = 1;

		$data = array(
										'number' => $entry->number,
										'header' => $entry->header,
										'header_source' => $entry->headerSource,
										'content' => $entry->contentHtml,
										'author' => $entry->author,
										'author_source' => $entry->authorSource,
										'happy' => $analyseH,
										'neutral' => $analyseN,
										'unhappy' => $analyseU,
										'np_weight' => $entry->notrPolarWeight,
										'hu_weight' => $entry->happyUnhappyWeight,
										'like_count' => 0
									);

		if(!$this->Analyse_Model->insert_analyzed_entry($data)){
			redirect('');
		}

		$this->data['entry'] = $entry;
		$this->data['hnu'] = $data;

		//$this->data['pagetitle'] = 'test';
    $this->render('analyse_view');
    //$this->render(NULL, 'json');
  }
}

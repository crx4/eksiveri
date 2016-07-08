<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entry {
	public $number = 0;
	public $header = '';
	public $headerSource = '';
	public $contentText = '';
	public $contentHtml = '';
	public $author = '';
	public $authorSource = '';
	public $time = '';
	public $analysis = '';
	public $notrPolarWeight = 0.0;
	public $happyUnhappyWeight = 0.0;
}

class Sentiment_analysis {

	public function preprocessing_text($text) {

		$text = " ".$text." ";

		/* EMOTION TAGS */
		$text = str_replace(" :o ", " SADEMOTICON ", $text);
		$text = str_replace(" :/ ", " SADEMOTICON ", $text);
		$text = str_replace(" :'( ", " SADEMOTICON ", $text);
		$text = str_replace(" (: ", " SMILEEMOTICON ", $text);
		$text = str_replace(" ): ", " SADEMOTICON ", $text);
		$text = str_replace(" :) ", " SMILEEMOTICON ", $text);
		$text = str_replace(" xd ", " SMILEEMOTICON ", $text);
		$text = str_replace(" ;d ", " SMILEEMOTICON ", $text);
		$text = str_replace(" :-) ", " SMILEEMOTICON ", $text);
		$text = str_replace(" :p ", " SMILEEMOTICON ", $text);
		$text = str_replace(" >:( ", " SADEMOTICON ", $text);
		$text = str_replace(" ♥ ", " SMILEEMOTICON ", $text);
		$text = str_replace(" lol ", " SMILEEMOTICON ", $text);
		$text = str_replace(" swh ", " SMILEEMOTICON ", $text);
		$text = str_replace(" haha ", " SADEMOTICON ", $text);
		$text = str_replace(" asdas ", " SADEMOTICON ", $text);
		$text = str_replace(" ehehe ", " SADEMOTICON ", $text);

		/* EKŞİ TAGS */
		$text = str_replace(" (bkz: ", " ", $text);
		$text = str_replace(" --- spoiler --- ", " ", $text);
		$text = str_replace(" the ", " ", $text);
		$text = str_replace("$", "s", $text);
		$text = str_replace(" hede ", " ", $text);
		$text = str_replace(" edit: ", " ", $text);
		$text = str_replace(" düdüt: ", " ", $text);
		$text = str_replace(" düzeltme: ", " ", $text);
		$text = str_replace(" debe editi; ", " ", $text);

		/* CONVERT TR CHARS */
		$search = array('ç','ğ','ı','ö','ş','ü');
		$replace = array('c','g','i','o','s','u'); 
		$text = str_replace($search,$replace,$text);
		
		/* CLEAR PUNC. */
		$text = preg_replace('/[^a-z0-9]+/i', ' ', $text);

		return $text;
	}
  
	public function sentiment_analysis( $entry = array(
														'number' => 0, 
														'header' => '', 
														'headerSource' => '', 
														'contentText' => '', 
														'contentHtml' => '', 
														'author' => '', 
														'authorSource' => '', 
														'time' => '', 
														'analysis' => '', 
														'notrPolarWeight' => 0.0, 
														'happyUnhappyWeight' => 0.0
														
													  ), $words = array()) {
		
		$content_text = explode(' ', $entry['contentText']);
		$sumOfNP = 0.3496;
		$sumOfHU = -0.0904;
		$entry_r = new Entry();
		
		foreach($content_text as $content_word){
			foreach($words as $word){
				if($content_word === $word->word){
					$sumOfNP += 0.3496 + $word->smo_np;
					$sumOfHU += -0.0904 + $word->smo_hu;
				}
			}
		}
		
        if( $sumOfNP == 0.0 && $sumOfHU == 0.0)
            $entry_r->analysis = 'z';
        else if($sumOfNP < -0.2)
            $entry_r->analysis = 'n';
        else {
            if ($sumOfHU > 0)
				$entry_r->analysis = 'h';
            else
				$entry_r->analysis = 'u';
        }
		
		
		
		$entry_r->number = $entry['number'];
		$entry_r->header = $entry['header'];
		$entry_r->headerSource = $entry['headerSource'];
		$entry_r->author = $entry['author'];
		$entry_r->authorSource = $entry['authorSource'];
		$entry_r->time = $entry['time'];
		$entry_r->notrPolarWeight = $sumOfNP;
		$entry_r->happyUnhappyWeight = $sumOfHU;
		$entry_r->contentHtml = '<div class="content">'.$entry['contentHtml'].'</div>';
		$entry_r->contentText = $entry['contentText'];
		return $entry_r;
	}
}

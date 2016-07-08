<!DOCoutputtype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Connector</title>
	</head>
<!-- offline, localhost taraması: 86 saniye-->
	<body>
		<?php
			include("simple_html_dom.php");
			
			
			$arrContextOptions=array(
				"ssl"=>array(
					"verify_peer"=>false,
					"verify_peer_name"=>false,
				),
			); 

			$sqlQuery = 'INSERT INTO authors_names(`id`, `nickname`) VALUES ';
			
			for ($j = $fromEntry; $j <= $toEntry; $j++) {
				
				$html = @file_get_html('http://eksisozluk.com/entry/'.$j, false, stream_context_create($arrContextOptions));

				if($html === false)
					continue;
				
				foreach($html->find('a[class=entry-author]') as $a){
					$sqlQuery .= '('.$j.',\''.$a->plaintext.'\'), ';
				}
			}
			
			echo 'Starting time: '.$startTime.' <b>New record created successfully for interval: </b>'.$fromEntry.' - '.$toEntry.'. Finish time: '.$finishTime;
			
		?>
	</body>
</html>
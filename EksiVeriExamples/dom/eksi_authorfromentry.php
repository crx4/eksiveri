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
			
			$startTime = date('h:i:s');
			
			// SETTINGS
			$fromEntry = htmlspecialchars($_GET["from"]);
			$toEntry = htmlspecialchars($_GET["to"]);
			
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
			
			$finishTime = date('h:i:s');
			
			$sqlQuery = substr($sqlQuery, 0, strlen($sqlQuery) - 2);
			$sqlQuery2 = 'INSERT INTO checklist(`start_time`, `finisih_time`, `qinterval`) VALUES (\''.$startTime.'\', \''.$finishTime.'\', \''.$fromEntry.'-'.$toEntry.'\')';
			
			$servername = "localhost";
			$username = "root";
			$password = "Dx87kcan";
			$dbname = "eksi";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			if ($conn->query($sqlQuery) === TRUE) {
				echo 'Starting time: '.$startTime.' <b>New record created successfully for interval: </b>'.$fromEntry.' - '.$toEntry.'. Finish time: '.$finishTime;
			} else {
				echo "Error: " . $sqlQuery . "<br>" . $conn->error;
			}
			if ($conn->query($sqlQuery2) === TRUE) {
				echo ' <b>&uml;</b><br />';
			} else {
				echo "Error: " . $sqlQuery2 . "<br>" . $conn->error;
			}

			$conn->close();
		?>
	</body>
</html>
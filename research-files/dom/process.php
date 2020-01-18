<!DOCoutputtype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Connector</title>
	</head>
<!-- offline, localhost taraması: 86 saniye-->
	<body>
		<?php
			// SETTINGS
			$i1 = htmlspecialchars($_GET["i1"]);
			$i2 = htmlspecialchars($_GET["i2"]);
			
			while($i1<$i2){
				// create a new cURL resource
				$ch = curl_init();

				// set URL and other appropriate options
				curl_setopt($ch, CURLOPT_URL, "http://localhost/dom/eksi_authorfromentry.php?from=".$i1."&to=".($i1+100));
				curl_setopt($ch, CURLOPT_HEADER, 0);

				// grab URL and pass it to the browser
				curl_exec($ch);

				// close cURL resource, and free up system resources
				curl_close($ch);
				
				$i1 = $i1 + 100;
			}
?>

	</body>
</html>
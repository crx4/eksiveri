<!DOCoutputtype html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Crawler Örneği</title>
	</head>

	<body>
		<?php
		/*
		import.io REST API - example PHP code
		This file is an example for integrating with the import.io REST API using PHP
		Dependencies: Requires cURL module to be installed
		@author: dev@import.io
		@source: https://github.com/import-io/importio-client-libs/tree/master/rest-php
		*/
		// Populate your credentials from My Account (https://import.io/data/account)
		$userGuid = "329e4ce0-bd9c-4f2b-8253-95b460be7da4";
		$apiKey = "329e4ce0bd9c4f2b825395b460be7da4313ad725d0a780b98181f26502c18fb2b37d6c2f701f71c0c22bd6976fc1ad77fd9d55a2a8c129732ea0a8f5660ff5e26c1f19f76838a257200dd7f91154511a";
		// Issues a query request to import.io
		function query($connectorGuid, $input, $userGuid, $apiKey) {
			$url = "http://query.import.io/store/connector/" . $connectorGuid . "/_query?_user=" . urlencode($userGuid) . "&_apikey=" . urlencode($apiKey);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"Content-Type: application/json",
				"import-io-client: import.io PHP client",
				"import-io-client-version: 2.0.0"
			));
			curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode(array("input" => $input)));
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$result = curl_exec($ch);
			curl_close($ch);
			return json_decode($result);
		}
		// Example of doing a query
		$result = query("c56aa7ad-1201-4da8-ac11-eb886d256416", array("input" => "query",), $userGuid, $apiKey);

		//	$quetrr = (array)$result;
		//	print("<pre>".print_r($quetrr,true)."</pre>");
		// Example of doing a query
		//$result = query("c56aa7ad-1201-4da8-ac11-eb886d256416", array("input" => "japon",), $userGuid, $apiKey);

			$quetrr = (array)$result;

			$quetrr2 = (array)$quetrr["results"][0];

			//print("<pre>".print_r($quetrr2,true)."</pre>");

			echo("<b>Yazarın Takma Adı: </b>" . $quetrr2["name"] . "<br />");
			echo("<b>Yazarın Profili: </b><a target='_blank' href='https://eksisozluk.com/biri/" . $quetrr2["name"] . "'>https://eksisozluk.com/biri/" . $quetrr2["name"] . "<a><br />");
			echo("<b>Yazarın Son Girdisi: </b><a target='_blank' href='https://eksisozluk.com" . $quetrr2["son_girdi_linki/_source"] . "'>" . $quetrr2["son_girdi_linki/_title"] . " " . $quetrr2["son_girdi_linki/_text"] . "<a><br />");
			echo("<br /><br /><b>Dönen Nesnenin Veri Yapısı: </b><br />");
			print("<pre>".print_r($quetrr,true)."</pre>");
		?>
	</body>
</html>
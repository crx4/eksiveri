<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
    
    $url = "https://api.import.io/store/connector/b353e9d1-b3c9-4a8a-8ef1-75f3aa5177e1/_query?format=JSON&input=title_name%3Amelek%20baykal&_apikey=329e4ce0bd9c4f2b825395b460be7da4313ad725d0a780b98181f26502c18fb2b37d6c2f701f71c0c22bd6976fc1ad77fd9d55a2a8c129732ea0a8f5660ff5e26c1f19f76838a257200dd7f91154511a";
    
    //  Initiate curl
    $ch = curl_init();
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$url);
    // Execute
    $result=curl_exec($ch);
    // Closing
    curl_close($ch);

    // Will dump a beauty json :3
    $query = json_decode($result, true);
    
    print("<pre>".print_r($query,true)."</pre>");
         
    ?>
</body>
</html>

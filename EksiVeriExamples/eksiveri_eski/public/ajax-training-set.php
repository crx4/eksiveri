<?php
   
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "Dx87kcan";
   $dbname = "eksiveri";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());
   
   // Retrieve data from Query String
   $analysis = $_GET['analysis'];
   $id = (int)$_GET['id'];
   
   // Escape User Input to help prevent SQL Injection
   $analysis = mysql_real_escape_string($analysis);
   $id = mysql_real_escape_string($id);
   
   //build query
   $query = "UPDATE training_set SET analysis = '$analysis' WHERE id = $id";
   
   //Execute query
   $qry_result = mysql_query($query) or die(mysql_error());
?>
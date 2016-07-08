<?php
$limit = 5;

$con = mysqli_connect("localhost","root","Dx87kcan","eksiveri");
$con->set_charset("utf8");

if(mysqli_connect_errno()){
echo "Database did not connect";
exit();
}
?>
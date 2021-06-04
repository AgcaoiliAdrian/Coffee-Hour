<?php
session_start();
$con=mysqli_connect("remotemysql.com","rQfEG8iyLP","jCH9v6IK8m","rQfEG8iyLP");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/Coffee Hour');
define('SITE_PATH','http://localhost/Coffee%20Hour/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/media/product/');
?>

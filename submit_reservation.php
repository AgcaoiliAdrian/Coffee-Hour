<?php
require('connection.inc.php');
require('functions.inc.php');
$res_name=get_safe_value($con,$_POST['name']);
$res_email=get_safe_value($con,$_POST['email']);
$res_mobile=get_safe_value($con,$_POST['mobile']);
$res_date=get_safe_value($con,$_POST['date']);
$res_time=get_safe_value($con,$_POST['time']);
$reserve=rand(111111,999999);
mysqli_query($con,"insert into reservation(reserve_id,name,email,mobile,date,time) values('$reserve','$res_name','$res_email','$res_mobile','$res_date','$res_time')");
echo "Thank you";
?>
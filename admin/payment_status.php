<?php 
include ("inc/connect.php");
$pay_id=$_GET['payid'];
$sts=$_GET['sts'];
$sql="update payment set pay_status='$sts' where pay_id='$pay_id'";
mysqli_query($conn,$sql);
$sql="select user_id from payment where pay_id='$pay_id'";
$userID=ReturnAnyValue($conn,$sql);
$sql="update users set plan='$sts' where user_id='$userID'";
mysqli_query($conn,$sql);
header("Location:manage_payment.php");
?>
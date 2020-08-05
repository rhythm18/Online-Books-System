<?php include("inc/connect.php");
$id=$_GET['id'];
$sql="delete from payment where pay_id=$id";
mysqli_query($conn,$sql);
header("Location:manage_payment.php");

?>
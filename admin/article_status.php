<?php 
include ("inc/connect.php");
$art_id=$_GET['artid'];
$sts=$_GET['sts'];
$sql="update articles set status='$sts' where art_id='$art_id'";
mysqli_query($conn,$sql);
header("Location:manage_article.php");
?>
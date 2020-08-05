<?php include("inc/connect.php");
$id=$_GET['id'];
$sql="delete from book_likes where like_status=0";
//mysqli_query($conn,$sql);
header("Location:my-likes.php");
?>
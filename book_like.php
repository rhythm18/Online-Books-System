<?php session_start();
include("inc/connect.php");
$uid=$_SESSION['user_id'];
$bookID=$_GET['id'];
$bookSTS=$_GET['sts'];
$sql="select count(*) from book_likes where user_id='$uid' and  art_id='$bookID'";
$cnt=ReturnAnyValue($conn,$sql);
$dt=date("Y-m-d");
if($cnt>0)
{
	$sql="update book_likes set like_status='$bookSTS',updated_at='$dt' where user_id='$uid' and art_id='$bookID'";
}
else
{

	$sql="insert into book_likes (art_id,user_id,like_status,updated_at) values('$bookID','$uid','$bookSTS','$dt')";
}

mysqli_query($conn,$sql);
if (isset($_GET['src'])) {
	header("Location:my-likes.php");
}
else{
header("Location:index.php");
}
?>
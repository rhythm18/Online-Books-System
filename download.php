<?php session_start();
include("inc/connect.php");
$bookID=$_GET['aid'];
$sql="select f_name from articles where art_id=".$bookID;
$fn=ReturnAnyValue($conn,$sql);
$filePath="uploads/books/";
$filename=$filePath.$fn;

$uid=$_SESSION['user_id'];
$sql="update articles set downloads=downloads+1 where art_id='$bookID'";
mysqli_query($conn,$sql);

$sql="select count(*) from book_download where user_id='$uid' and art_id='$bookID'";
$cnt=ReturnAnyValue($conn,$sql);
$dt=date("Y-m-d");
if ($cnt==0) {
	$sql="insert into book_download (user_id,art_id,created_at) values ('$uid','$bookID','$dt')";
	mysqli_query($conn,$sql);
}
header('Content-type:application/pdf');
header('Content-disposition: inline; filename="'.$filename.'"');
header('content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
echo file_get_contents($filename);
?>

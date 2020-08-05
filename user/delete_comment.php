<?php include("../admin/inc/connect.php");
$id=$_GET['id'];
$sql="delete from comments where cmt_id=$id";
if (mysqli_query($conn,$sql))
    {
      $msg="Comment Deleted Successfully";
      $url="manage_comment.php?std=s&msg=$msg";
      gotopage($url);

    }
  
  else
    { 
        $msg="There was a problem ";
        $url="manage_comment.php?std=f&msg=$msg";
        gotopage($url); 
    }




?>
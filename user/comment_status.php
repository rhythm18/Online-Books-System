<?php 
include ("../admin/inc/connect.php");
$cmt_id=$_GET['cmtid'];
$sts=$_GET['sts'];
$sql="update comments set cmt_status='$sts' where cmt_id='$cmt_id'";


if (mysqli_query($conn,$sql))
    {
    	if($sts==1)
    	{
    	  $msg="Comment Activated !";
	      $url="manage_comment.php?st=s&msg=$msg";
	      gotopage($url);
    	}

    	if($sts==0)
    	{
    	  $msg="Comment De-Activated !";
	      $url="manage_comment.php?st=s&msg=$msg";
	      gotopage($url);
    	}
     

    }
  
  else
    { 
        $msg="There was a problem ";
        $url="manage_comment.php?st=f&msg=$msg";
        gotopage($url); 
    }
?>
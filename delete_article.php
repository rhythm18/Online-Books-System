<?php include("inc/connect.php");
$id=$_GET['id'];
$sql="delete from articles where art_id=$id";
//mysqli_query($conn,$sql);
//header("Location:manage_article.php");
if (mysqli_query($conn,$sql))
    {
      $msg="Article Deleted Successfully";
      $url="my-book.php?std=s&msg=$msg";
      gotopage($url);

    }
  
  else
    { 
        $msg="There was a problem ";
        $url="manage_article.php?std=f&msg=$msg";
        gotopage($url); 
    }

?>
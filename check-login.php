<?php session_start();

include("inc/connect.php");

$sts='';

if(isset($_POST['submitLogin'])){

	$email=$_POST['userEmail'];

  $pass=$_POST['userPass'];

  $ip=$_SERVER['REMOTE_ADDR'];


  //$sql="select * from users where (email='$email' or mobile='$email' or member_id='$email') and password='$pass'";
  $sql="select status from users where email='$email'";
  $status=ReturnAnyValue($conn,$sql);

      if($status==0)
        {
          $sts=2;
          header('Location:index.php?sts=2');

        }
      else
        {

             $sql="select * from users where email='$email' and user_pass='$pass'";
              $rs=mysqli_query($conn,$sql);

              $cnt=mysqli_num_rows($rs);

              $row = mysqli_fetch_array($rs);

              if($cnt>0)
                {

                
                  $_SESSION['user_id']=$row['user_id'];

                  $_SESSION['name']=$row['first_name']." ".$row['last_name'] ;
                  $_SESSION['plan']=$row['plan'];

                  $sql="update users set last_activity=now(),login_ip='$ip' where user_id=".$_SESSION['user_id'];
                  mysqli_query($conn,$sql);


                 header('Location:dashboard.php');

                }
        


              else
                {


                  $sts=0;
                   header('Location:index.php?sts=0');

                }
        }


  

}



?>






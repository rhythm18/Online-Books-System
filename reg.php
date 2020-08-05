<?php include ("inc/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>TOB</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/title-icon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   <?php include("inc/site-header.php");?>


  <?php

if(isset($_POST['submit']))
{
  $fname=$_POST['first_name'];
  $lname=$_POST['last_name'];
  $email=$_POST['email'];
  $pass=$_POST['user_pass'];
  $cpass=$_POST['c_user_pass'];
  $city=$_POST['city'];

  $mobile=$_POST['mobile'];
  

  $join_date=date('Y-m-d h:i:s');

  
if($pass!=$cpass)
          {
            echo "<div class='alert alert-danger bm-2'>Passwords does not match !</div>";

           
          }

  
//check email already used 
$sql="SELECT COUNT(*) FROM users WHERE email='$email'";
$cnt=ReturnAnyValue($conn,$sql);


    if($cnt>0) 
        {
            echo "<div class='alert alert-danger bm-2'>This E-mail ID is already Registered !!! </div>";
           
        } 

      
    
        else
          {
            

              $sql="insert into users(first_name,last_name,mobile,city,email,user_pass,created_at) values ('$fname','$lname','$mobile','$city','$email','$pass','$join_date')";



                if(mysqli_query($conn,$sql))
                      {

                          echo "<div class='alert alert-success bm-2'><b>Registration Complete !</b> Please verify your E-mail !</div>";

                              include("send_welcomeletter.php");

                              
                     }

                  else 
                        {
                            echo "<div class='alert alert-danger bm-2'><b>There was some error !</b> Please Contact Admin !</div>";
                        }

            }
          
  
}
  ?> 
</body>
</html>
  
 
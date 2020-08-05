<?php include("inc/chkAuth.php");
include("inc/connect.php");?>
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
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

    <!-- LOADER -->
    <!--<div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div>--><!-- end loader -->
    <!-- END LOADER -->
<?php include("inc/site-header.php");?>
   

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                

                                
                                <h3>Change Password</h3><br>
                                <?php

if(isset($_POST['submit']))
{
  
  $pass=$_POST['user_pass'];
  $npass=$_POST['npass'];
  $cpass=$_POST['cpass'];
  $id=$_SESSION['user_id'];
  

  $sql="select * from users where user_id='$id' and user_pass='$pass'";
  
  $rs=mysqli_query($conn,$sql);

  $cnt=mysqli_num_rows($rs);

  if($cnt==0)
  {
    echo "<div class='alert alert-danger bm-2'><b>Sorry Invalid Password !</b></div>";
    echo "<a href='changepass.php'><div class='text-primary'>Click here to go back</a></div>";

  }

  else
  {
    if($cpass!=$npass)
    {
      echo "<div class='alert alert-danger bm-2'><b>Both Passwords Must be same !</b></div>";
      echo "<a href='changepass.php'><div class='text-primary'>Click here to go back</a></div>";
    }
    else
    {
      $sql="update users set user_pass='$npass' where user_id=$id";
        if(mysqli_query($conn,$sql))
          {
               echo "<div class='alert alert-success bm-2'><b>Password Updated Successfully !</b></div>";
               echo "<a href='dashboard.php'><div class='text-primary'>Click here to go back</a></div>";
          }
        else
        {
          echo "There was some error ";
        }
    }
  }
}
else
  
{
?>  
  
  <form class="form-horizontal" id="userprofile" enctype="multipart/form-data" method="post" action="">
        
     <div class="form-group row">
    <label for="user_pass" class="control-label col-md-3">Old Password: </label>
        <div class="col-md-8">
    <input name="user_pass" type="password" class="form-control" id="user_pass" required>
  </div>
</div>
 <div class="form-group row">
    <label for="npass" class="control-label col-md-3">New Password: </label>
        <div class="col-md-8">
    <input name="npass" type="password" class="form-control" id="npass"required>
  </div>
</div>

  <div class="form-group row">
    <label for="cpass" class="control-label col-md-3">Confirm Password: </label>
        <div class="col-md-8">
          <input name="cpass" type="password" class="form-control" id="cpass" required>
  </div>
</div>

  
         
        
        <div class="form-group row">
                  <div class="col-md-8 col-md-offset-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Change Password" class="btn btn-primary">
                      </label>
                    </div>
                  </div>
                </div>
        
        
        
              </form>
            
            <?php
          }
          ?>


                                
                            </div><!-- end title -->

                            

                            <div class="blog-content">  
                                

                                

                                
                            </div><!-- end content -->

                            

                            

                            <hr class="invis1">

                           

                            
                            

                           

                            

                    

                           

                           
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                 <?php include("inc/inner-right-panel.php");?>
                   
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <footer class="footer">
      <?php include("inc/site-footer.php");?>
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>
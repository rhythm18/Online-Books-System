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
                                

                                
                                <h3>My Profile</h3>
            
      
      <?php

if(isset($_POST['submit']))
{

  $id=$_SESSION['user_id'];
  $email=$_POST['email'];
  $fname=$_POST['first_name'];
  $lname=$_POST['last_name'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $mobile=$_POST['mobile'];
  $udate = date("Y-m-d");
  
    if(isset($_POST['sub_status']))
    {
      $sts=1;
    }
    else
    {
      $sts=0;
    }



 $sql="update users set first_name='$fname',last_name='$lname',state='$state',city='$city',mobile='$mobile',sub_status='$sts',updated_at='$udate' where user_id=$id";

   if(mysqli_query($conn,$sql))
   {
     echo "<div class='alert alert-success bm-2'><b>Profile Updated Successfully</b></div>";
     $sql="select count(*) from subscribers where email='$email'";
    
      $cnt=ReturnAnyValue($conn,$sql);
        
        if ($cnt>0) 
              {
                 $sql="update subscribers set status='$sts' where email='$email'";
                 mysqli_query($conn,$sql);
                 echo "<div class='alert alert-primary bm-2'><b>Subscription Updated Successfully</b></div>";

              }

        else 
            {
        
                $sql="insert into subscribers(email,status) values('$email','1')";
                mysqli_query($conn,$sql);
                echo "<div class='alert alert-primary bm-2'><b>Subscription Added Successfully</b></div>";


            }
    
   }
   else
   {
     echo "<div class='alert alert-danger bm-2'>There was some Problem, <b>Please Try again later !</b> </div>";
   }
}
else
{
  $sql="select * from users where user_id=".$_SESSION['user_id'];
  
  $rs=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($rs);

?>
  
  <form class="form-horizontal" id="userprofile" enctype="multipart/form-data" method="post" action="">
        
   <div class="form-group mt-3 row">
    <label for="email" class="control-label col-md-3">Email:  </label>
    <div class="col-md-8">
      <input name="email" type="text" class="form-control"  id="email" value="<?php echo $row['email'];?>" readonly>
    </div>
  </div>     
  <div class="form-group row">
    <label for="first_name" class="control-label col-md-3">First Name:  </label>
    <div class="col-md-8">
      <input name="first_name" type="text" class="form-control"  id="first_name" value="<?php echo $row['first_name'];?>" required>
    </div>
  </div>  


<div class="form-group row">
    <label for="last_name" class="control-label col-md-3">Last Name:  </label>
    <div class="col-md-8">
    <input name="last_name" type="text" class="form-control" id="last_name" value="<?php echo $row['last_name'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="mobile" class="control-label col-md-3">Contact No:  </label>
    <div class="col-md-8">
    <input name="mobile" type="text" class="form-control" id="mobile" value="<?php echo $row['mobile'];?>">
  </div>
</div>

  <div class="form-group row">
    <label for="city" class="control-label col-md-3">City:  </label>
    <div class="col-md-8">
    <input name="city" type="text" class="form-control" id="city"value="<?php echo $row['city'];?>" required>
    </div>
  </div>

<div class="form-group row">
    <label for="state" class="control-label col-md-3">State:  </label>
    <div class="col-md-8">
    <input name="state" type="text" class="form-control" id="state"value="<?php echo $row['state'];?>">
    </div>
</div>


<div class="form-group row">
                  <label class="control-label col-md-3">Subscribe our Newsletter</label>
                  <div class="col-md-1">
                    
                  <?php
                  if ($row['sub_status']==1) {
                    $str="checked";
                  }
                  else {
                    $str="";
                  }
                    ?>
                  
<input class="form-control" type="checkbox" name="sub_status" id="sub_status" value="1" <?php echo $str;?> >
                  </div>
                </div>
         
        
        <div class="form-group row">
                  <div class="col-md-8 col-md-offset-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
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
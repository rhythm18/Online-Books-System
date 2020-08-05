<?php

include("../admin/inc/connect.php");
include("inc/chkAuth.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>My Profile</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php"><?php 
include("inc/company_name.php");
?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"></a>
          
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
	<?php
	include("inc/menu.php");
	?>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> My Profile</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">My Profile</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			
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

    
  

   


 $sql="update users set first_name='$fname',last_name='$lname',state='$state',city='$city',mobile='$mobile',sub_status='$sts',updated_at='$udate' where user_id=$id";

   if(mysqli_query($conn,$sql))
   {
     echo "<div class='alert alert-success bm-2'><b>Profile Updated Successfully</b></div>";
    
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
				
   <div class="form-group row">
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
                  <label class="control-label col-md-6">Subscribe our Newsletter</label>
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
            </div>
            <?php
          }
          ?>
            </div>
            
          </div>
        </div>
        <div class="clearix"></div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      
    </script>
  </body>
</html>
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
    <link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />
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
                              
       <h3>Dashboard</h3>  <br>
        
         <?php
$sql="select last_activity,login_ip from users where user_id=".$_SESSION['user_id'];


$rs=mysqli_query($conn,$sql);



$cnt=mysqli_num_rows($rs);



while($row=mysqli_fetch_array($rs))



{ 



  //echo "<div style='text-align:right'>";



  echo "<br>Last Login: ".$row['last_activity'];



  echo "<br> From IP: ".$row['login_ip']."";



}

?>

  




         <?php 
$sql="SELECT COUNT('*') as cntArt from articles WHERE user_id=".$_SESSION['user_id'];
$cntArt=ReturnAnyValue($conn,$sql);


$sql="SELECT COUNT('*') as artAprroved from articles WHERE status='1' and user_id=".$_SESSION['user_id'];
$artAprroved=ReturnAnyValue($conn,$sql);

$sql="SELECT COUNT('*') as artRejected from articles WHERE status='0' and user_id=".$_SESSION['user_id'];
$artRejected=ReturnAnyValue($conn,$sql);

$sql="SELECT COUNT('*') as artPending from articles WHERE status='2' and user_id=".$_SESSION['user_id'];
$artPending=ReturnAnyValue($conn,$sql);

$sql="SELECT sum(views) from articles where user_id=".$_SESSION['user_id'];
$sumViews=ReturnAnyValue($conn,$sql);

$sql="select plan from users where user_id=".$_SESSION['user_id'];
$plan=ReturnAnyValue($conn,$sql);

if($plan==0)
{
  $userPlan="Free";
}
else
{
  $userPlan="Paid";
}



        
?>
<div class="card-columns">
                     
 <div class="card bg-warning mt-2 text-white">
  <div class="card-body text-center"><br>
  <p class="text-white">Membership: <?php echo $userPlan;?></p>
  </div>
</div>
<div class="card bg-primary mt-2 text-white">
  <div class="card-body text-center"><br>
  <p class="text-white">My Books: <?php echo $cntArt;?></p>
  </div>
</div>

  <div class="card bg-success mt-2 text-white">
    <div class="card-body text-center"><br>
    <p class="text-white">Approved: <?php echo $artAprroved;?></p>
  </div>
</div>
  <div class="card bg-danger mt-2 text-white">
    <div class="card-body text-center"><br>
    <p class="text-white">Rejected: <?php echo $artRejected;?> </p>
  </div>
</div>

  <div class="card bg-warning mt-2 text-white">
    <div class="card-body text-center"><br>
     <p class="text-white">Pending: <?php echo $artPending;?></p>
  </div>
</div>

  <div class="card bg-info mt-2 text-white">
     <div class="card-body text-center"><br>
   <p class="text-white">Total Views: <?php echo $sumViews;?></p>
  </div>
</div>

</div>
                                
                               




              

             

                   



                                

                                
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
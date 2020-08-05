<?php include("inc/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Be Technical</title>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form class="form-inline">
                        <input type="text" class="form-control" placeholder="What you are looking for?">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div><!-- end top-search -->

        

        <?php include("inc/site-header.php");?>
        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">

<?php

if(isset($_POST['submit']))

{
        $email=$_POST['email'];

        $sql="select COUNT(*) from users where email='$email'";
        $cntEmail=ReturnAnyValue($conn,$sql);

        if($cntEmail>0)
        {
            $sql="update users set sub_status=0 where email='$email'";
            mysqli_query($conn,$sql);
        }

          $sql="update subscribers set status=0 where email='$email'";

          if (mysqli_query($conn,$sql))
              
              {
               // echo "<b>You have successfully subscribed our newsletter</b>";
                echo "<div class='alert alert-success bm-2'><b>Subscription Removed !</b></div>";

              }
}

else
 {
                         
?>
 <hr class="invis">

    <div class="newsletter-widget text-center">

<form class="form-inline" action="" method="post">
        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email address">
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Unsubscribe <i class="fa fa-envelope-open-o"></i></button>
</form>
<?php
}
?>
</div>

</div>
</div>
</div>

        

        <?php //include("inc/about-author.php");?>

        <?php include("inc/inner-right-panel.php");?>

        <?php include("inc/site-footer.php");?>

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
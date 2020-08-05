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
<?php
if (isset($_POST['submit']))
{
$paymethod=$_POST['pay_method'];
$paydate=$_POST['pay_date'];
$paydet=$_POST['pay_detail'];
$user_id=$_SESSION['user_id'];

    $sql="insert into payment (user_id,pay_method,pay_detail,pay_date) values('$user_id','$paymethod','$paydet','$paydate')";
    if(mysqli_query($conn,$sql))
    {
        echo "Payment Updated Successfully !";
    }
}

else
{

?>

                                
                                <h3>Payment Details</h3><br>
                               <form action="#" method="post">
 <p>
Choose Your Payment Option:
<select name="pay_method" id="pay_method">
  <option value="">Select...</option>
  <option value="banktransfer">Bank Transfer</option>
  <option value="paytm">Paytm</option>
</select>
<div class="form-group row">
    <label for="pay_date" class="control-label col-md-3">Payment Date </label>
        <div class="col-md-5">
    <input name="pay_date" type="date" class="form-control" id="pay_date" required>
  </div>
</div>
<div class="form-group row">
    <label for="pay_detail" class="control-label col-md-3">Payment Details</label>
        <div class="col-md-5">
    <textarea name="pay_detail" type="text" class="form-control" id="pay_detail" required></textarea>
  </div>
</div>
 
 <input type="submit" name="submit" value="Submit">
</p>
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
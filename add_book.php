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
                                

                                
                                <h3>Add Book</h3>
                               
<?php
if (isset($_POST['submit']))
 {
  $id=$_SESSION['user_id'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$details=mysqli_real_escape_string($conn,$_POST['details']);
$tags=mysqli_real_escape_string($conn,$_POST['tags']);
$cid=$_POST['cat_id'];
$dt=date("Y-m-d h:i:s");

$n=rand(10,999999);
 $pdfPages=0; $pdfSize=0;                      
function countPages($path) {

  $pdftext = file_get_contents($path);
  $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
  return $num;
}

$target_dir = "uploads/";
$target_file = $target_dir.$n."-".basename($_FILES["fileToUpload"]["name"]);
$filename=$n."-".basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
      {
        echo "The image file ".basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "Sorry, there was an error uploading your file.";
      }

      $target_dir= "uploads/books/";
$target_file=$target_dir.$n."-".basename($_FILES["fileToUploads"]["name"]);
$filenames=$n."-".basename($_FILES["fileToUploads"]["name"]);

    if (move_uploaded_file($_FILES["fileToUploads"]["tmp_name"], $target_file)) 
      {
        echo "The pdf file ".basename( $_FILES["fileToUploads"]["name"]). " has been uploaded.";
        $pdfPages = countPages($target_file);
        $pdfSize=filesize($target_file);
      } 

    else 
      {
        echo "Sorry, there was an error uploading your file.".$_FILES["fileToUploads"]["error"];
      }
   



  $sql="insert into articles (user_id,cat_id,title,details,tags,post_date,update_date,pic1,f_name,page_count,file_size,status) values ('$id','$cid','$title','$details','$tags','$dt','$dt','$filename','$filenames','$pdfPages','$pdfSize','2')";

    if (mysqli_query($conn,$sql))
      {
        //gotopage("manage_article.php");
      }

    else
      {
        echo "Sorry there was a problem in adding your book";
        echo "<br>".$sql;
      }
}
else 
{
 

?>


              <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
               
                <div class="form-group row">
                  <label class="control-label col-md-3">Category</label>
                  <div class="col-md-8">
                   <select name="cat_id" id="cat_id">
                    <option value="0">--Select Category--</option>
                    <?php 
                    $sql="select * from category where cat_status=1";
                    $rs=mysqli_query($conn,$sql);

                    while($row=mysqli_fetch_array($rs))
                    {
                      echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";
                    }
                    ?>
                   </select>

                  </div>
                </div>

                 <div class="form-group row">
                  <label class="control-label col-md-3">Title</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="title" id="title">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Details</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="5" cols="80" name="details" id="details"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">Tags</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="tags" id="tags">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">Book</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUploads" id="fileToUploads">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                  </div>
                </div>
                
            
            
            <div class="form-group row">
                  <div class="col-md-4 ">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="ADD" class="btn btn-primary">
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
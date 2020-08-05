<?php include ("inc/chkAuth.php");
include ("../admin/inc/connect.php");
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
    <title>Add Books</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
  
  </head>
  <body class="app sidebar-mini">
    <header class="app-header"><a class="app-header__logo" href="dashboard.php"><?php include("inc/company_name.php");?></a>

     <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

      <ul class="app-nav">

        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
          <h1><i class="fa fa-dashboard"></i>Add Books</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="add_category.php">Add Category</a></li>
        </ul>
      </div>
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add</h3>

          
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

$target_dir = "../uploads/";
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

      $target_dir= "../uploads/books/";
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
                
              </div>
          </form>
          <?php
        }
        ?>
          </div>
        </div>


    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
  </body>
</html>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                               
                                

                                
                                <h3>My Books</h3>
                                <ul class="app-breadcrumb breadcrumb">
         
          <li class="breadcrumb-item"><a href="add_book.php"><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Books</h6></a></li>
        </ul>
                               <?php
            if(isset($_GET['st']) && $_GET['st']=='s')
            {
                echo "<div class='alert alert-success bm-2'><b>".$_GET['msg']."</b></div>";
            }
            if(isset($_GET['st']) && $_GET['st']=='f' )
            {
                echo "<div class='alert alert-danger bm-2'><b>".$_GET['msg']."</b></div>";

            }

            if(isset($_GET['std']) && $_GET['std']=='s')
            {
                echo "<div class='alert alert-success bm-2'><b>".$_GET['msg']."</b></div>";
            }
            if(isset($_GET['std']) && $_GET['std']=='f' )
            {
                echo "<div class='alert alert-danger bm-2'><b>".$_GET['msg']."</b></div>";

            }

      ?>
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover" id="sampleTable">
                  <thead>
                    <tr>
                      <!--<th>Category</th>
                      <th>Image</th>
                      <th>Book</th>
                      <th>Title</th>
                      <th>Post Date</th>
                      <th>Views</th>
                      <th>Downloads</th>
                      <th>Page Count</th>
                      <th>File Size</th>
                      <th>Action</th>
                      <th>Status</th>-->

                    </tr>
                  </thead>
                  <tbody>
<?php 
$sql="SELECT a.*,c.cat_name FROM articles a, category c where a.cat_id=c.cat_id and user_id=".$_SESSION['user_id']." order by a.art_id desc";
$rs=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($rs))
{
if ($row['status']==1) 
  $sts="Approved";
if($row['status']==2) 
  $sts="Pending";
if($row['status']==0) 
  $sts="Rejected";

  ?>
                   
<tr>
                      

                    <?php if ($row['pic1']!=null) {
                        ?>
                        <td><img src="uploads/<?php echo $row['pic1'];?>" width="120" height="120"> </td>
                      <?php
                    }
                    else {
                          
                      ?>

                      <td>NA</td>
                      <?php
                    }
                    ?>
                    


               


                      <td><a href="show-article.php?aid=<?php echo $row['art_id'];?>"><h4><?php echo $row['title'];?></h4></a>
                      <p><br>
                        <?php echo $row['cat_name'];?>&nbsp;&nbsp;&nbsp;
                        <?php echo $row['post_date'];?>&nbsp;&nbsp;&nbsp;
                                        Pages&nbsp;<?php echo $row['page_count'];?>&nbsp;&nbsp;&nbsp;
                                      <?php echo $row['file_size']/1000;?> KB&nbsp;&nbsp;&nbsp;
                                      
                                     <br>
                                      Views<?php echo $row['views'];?>&nbsp;&nbsp;&nbsp;
                                      Download&nbsp;&nbsp;<?php echo $row['downloads'];?>&nbsp;&nbsp;&nbsp;
                                      Status:&nbsp;<?php echo $sts;?>
                                      <br>
                            
                              <a href="download_book.php?aid=<?php echo $row['art_id'];?>"target=_blank style="color:blue">Download</a>&nbsp;&nbsp;&nbsp;
                                    <a href="preview_pdf.php?fn=<?php echo $row['f_name'];?>"target=_blank style="color:blue">Preview</a>&nbsp;&nbsp;&nbsp;
                                    <a href="delete_book.php?id=<?php echo $row['art_id'];?>" style="color:blue">Delete</a>&nbsp;&nbsp;&nbsp;
                                    <a href="edit_book.php?id=<?php echo $row['art_id'];?>" style="color:blue">Edit</a>&nbsp;&nbsp;&nbsp;

                                 
                                   
                      </p>

                      </td>
                      
                      

                      

                    </tr>
<?php
}
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

                                

                                
                            </div><!-- end title -->

                            

                            <div class="blog-content">  
                                

                                

                                
                            </div><!-- end content -->

                            

                            

                            <hr class="invis1">

                           

                            
                            

                           

                            

                    

                           

                           
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                 <?php //include("inc/inner-right-panel.php");?>
                   
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
    <script src="js/jquery-3.3.1.min.js"></script>
     <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>

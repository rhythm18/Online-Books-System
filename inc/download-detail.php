
<section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">

                                <ol class="breadcrumb hidden-xs-down">
                                   
<?php 
        $id=$_GET['aid'];
        $sql="select * from articles where art_id='$id'";
        $rsArt=mysqli_query($conn,$sql);
        $rowArt=mysqli_fetch_array($rsArt);
        $sql="select cat_name from category where cat_id=".$rowArt['cat_id'];
        $catName=ReturnAnyValue($conn,$sql);
        $sql="select first_name from users where user_id=".$rowArt['user_id'];
        $uName=ReturnAnyValue($conn,$sql);

        if($rowArt['user_id']==0)
        {
            $sql="select name from admin where admin_id=1";
            $uName=ReturnAnyValue($conn,$sql);
        }
        $fn=$rowArt['f_name'];
        $sql="update articles set views=views+1 where art_id='$id'";
        mysqli_query($conn,$sql);
?>
         <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#"><?php echo $catName;?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $rowArt['title'];?></li>
                                </ol>
          <?php
          if (isset($_SESSION['user_id']) && $_SESSION['plan']==0)  
          {
          echo "<h1>Your Download will be ready in 30 seconds</h1>";
          }
          ?>           

                                <span class="color-aqua"><a href="blog-category-01.html" title=""><?php echo $catName;?></a></span>

                                

                               

                               <!-- <div class="post-sharing">
                                    <ul class="list-inline">
                                      

                                        <li><a href="https://twitter.com/share?url=betechnical.in/show-article.php?aid=<?php echo $id;?> &amp;text=<?php echo $rowArt['title'];?>&amp;hashtags=<?php echo $rowArt['tags'];?>" target="_blank"><img src="images/twitter.png" height="35" width="35"></a></li>
                                    
                                    <li><a href="http://www.facebook.com/share.php?u=betechnical.in/show-article.php?aid=<?php echo$id;?>" target="_blank"><img src="images/facebook.jpeg" height="35" width="35"></a></li>

                                     <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=betechnical.in/show-article.php?aid=<?php echo $id;?>" target="_blank"  title="Linkedin"><img src="images/linkedin.jpeg" height="35" width="35"></a></li>

                                    <li><a href="https://web.whatsapp.com/send?text=betechnical.in/show-article.php?aid=<?php echo $id;?>" target="_blank"><img src="images/whatsapp.jpeg" height="35" width="35"></a></li>

                                 </ul>
                             </div>-->

                            <div class="row">
                            
                            <div class="single-post-media col-md-4">
                                <img src="uploads/<?php echo $rowArt['pic1'];?>" style="height:300px; width:250px;" alt="" class="img-fluid">
                            </div><!-- end media -->
                            <div class="col-md-8">
                              <h4><?php echo $rowArt['title'];?></h4>
                               <div class="">
                                    <?php echo $rowArt['post_date'];?>&nbsp;&nbsp;&nbsp;
                                    <?php echo $uName;?>&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-eye"></i><?php echo $rowArt['views'];?>&nbsp;&nbsp;&nbsp;
                                     <?php echo $rowArt['page_count'];?>&nbsp;&nbsp;&nbsp;
                                      <?php echo $rowArt['file_size']/1000;?> KB&nbsp;&nbsp;&nbsp;
                                       <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><?php echo $rowArt['tags'];?></small>
                                    
                                </div><!-- end meta -->
                                      <div class="single-post-media">  
                                <div class="">
                                  <span>
                                    <div id="myDIV">
<?php
 if (isset($_SESSION['user_id'])) { ?> 
                                      <a href=download.php?aid=<?php echo $rowArt['art_id'];?> class="btn btn-primary text-white" target="_blank">DOWNLOAD NOW</a>

                                  <?php  
                                }
                                 else  {
                                    echo "You must login to download the book";
                                  }
                                  ?>
                                    </div>


                                    

                                    </span>         


                                </div><!-- end pp -->


                                </div><!-- end content -->

                                </div><!-- end meta -->

                            </div>

                        </div>


                            

                            <div class="blog-title-area">
                               

                                <div class="post-sharing">
                                    <ul class="list-inline">

                                          <li><a href="https://twitter.com/share?url=betechnical.in/show-article.php?aid=<?php echo $id;?> &amp;text=<?php echo $rowArt['title'];?>&amp;hashtags=<?php echo $rowArt['tags'];?>" target="_blank"><img src="images/twitter.png" height="35" width="35"></a></li>
                                    
                                          <li><a href="http://www.facebook.com/share.php?u=betechnical.in/show-article.php?aid=<?php echo$id;?>" target="_blank"><img src="images/facebook.jpeg" height="35" width="35"></a></li>

                                          <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=betechnical.in/show-article.php?aid=<?php echo $id;?>" target="_blank"  title="Linkedin"><img src="images/linkedin.jpeg" height="35" width="35"></a></li>

                                         <li><a href="https://web.whatsapp.com/send?text=betechnical.in/show-article.php?aid=<?php echo $id;?>" target="_blank"><img src="images/whatsapp.jpeg" height="35" width="35"></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->
                        </div>

                               
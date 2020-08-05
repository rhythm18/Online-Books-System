<section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                    <li class="breadcrumb-item active">The golden rules you need to know for a positive life</li>
                                </ol>
<?php 
$id=$_GET['aid'];
$sql="select * from articles where art_id='$id'";
$rsArt=mysqli_query($conn,$sql);
$rowArt=mysqli_fetch_array($rsArt);
$sql="select cat_name from category where cat_id=".$rowArt['cat_id'];
$catName=ReturnAnyValue($conn,$sql);
$sql="select first_name from users where user_id=".$rowArt['user_id'];
$uName=ReturnAnyValue($conn,$sql);
?>
                                <span class="color-aqua"><a href="blog-category-01.html" title=""><?php echo $catName;?></a></span>

                                <h3><?php echo $rowArt['title'];?></h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="single.html" title=""><?php echo $rowArt['post_date'];?></a></small>
                                    <small><a href="blog-author.html" title=""><?php echo $uName;?></a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i><?php echo $rowArt['views'];?></a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="uploads/<?php echo $rowArt['pic1'];?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <div class="pp">
                                    <p><?php echo $rowArt['details'];?> </p>

                                

                                </div><!-- end pp -->

                                </div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><?php echo $rowArt['tags'];?></small>
                                    
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            
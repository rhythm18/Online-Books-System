<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                 
                                <h2 class="widget-title">Categories</h2>
                                <div class="link-widget">
                                    <ul>
                                        <?php
                                    include("inc/category_with_count.php");
                                    ?>
                                    </ul>
                                </div><!-- end link-widget -->
                            

                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Recent Books</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <?php 
                                        $sql="select * from articles where status=1 order by art_id desc limit 5";
                                        $rsRcnt=mysqli_query($conn,$sql);
                                        while($rowRcnt=mysqli_fetch_array($rsRcnt))
                                        {
                                            ?>
                                      
                                        <a href="show-article.php?aid=<?php echo $rowRcnt['art_id'];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="uploads/<?php echo $rowRcnt['pic1'];?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1"><?php echo $rowRcnt['title'];?></h5>
                                                <small><?php echo $rowRcnt['post_date'];?></small>
                                            </div>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                        

                                        
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Advertising</h2>
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                        <a href="https://getdailyincome.in/index.php?refid=24080" target="_blank"> <img src="upload/gdi-banner.jpg" alt="" class="img-fluid"></a>
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->

                           <!-- <div class="widget">
                                <h2 class="widget-title">Instagram Feed</h2>
                                <div class="instagram-wrapper clearfix">
                                    <a class="" href="#"><img src="upload/insta_01.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_02.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_03.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_04.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_05.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_06.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_07.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_08.jpeg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/insta_09.jpeg" alt="" class="img-fluid"></a>
                                </div> end Instagram wrapper 
                            </div> end widget -->

                           
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

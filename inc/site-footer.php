            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Recent Books</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <?php
                                    $sql="select * from articles where status=1 order by art_id desc limit 3";
                                    $rsRcnt=mysqli_query($conn,$sql);
                                    while ($rowRcnt=mysqli_fetch_array($rsRcnt))
                                    {
                                        ?>
                                    
                                    <a href=show-article.php?aid=<?php echo $rowRcnt['art_id'];?> class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="uploads/<?php echo $rowRcnt['pic1'];?>"  alt="" class="img-fluid float-left">
                                            <h5 class="mb-1"><?php echo substr($rowRcnt['title'],0,50);?>... </h5>
                                            <small><?php echo $rowRcnt['post_date'];?> </small>
                                        </div>
                                    </a>
                                    <?php
                                }
                                ?>

                                    
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Books</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <?php
                                    $sql="select * from articles where status=1 order by views desc limit 3";
                                    $rsPop=mysqli_query($conn,$sql);
                                    while ($rowPop=mysqli_fetch_array($rsPop))
                                    {
                                        ?>
                                    <a href=show-article.php?aid=<?php echo $rowPop['art_id'];?> class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="uploads/<?php echo $rowPop['pic1'];?>" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1"><?php echo substr($rowPop['title'],0,50);?>...</h5>
                                            <!--<span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>-->
                                        </div>
                                    </a>
                                    <?php
                                }
                                ?>

                                    
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Categories</h2>
                            <div class="link-widget">
                                <ul>
                                    <?php
                                    include("inc/category_with_count.php");
                                    ?>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="invis1">

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="widget">
                            <div class="footer-text text-center">
                                <a href="index.html"><img src="images/logo.jpg" alt="" class="img-fluid"></a>
                                <p>TOB is your search engine for PDF files</p>
                                <div><b>Follow Us On</b></div>
                                <div class="social">
                                    <a href="index.php" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>   
                                 

                                    <a href="index.php" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="index.php" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                   
                                </div>

                                <hr class="invis">

                                <div class="newsletter-widget text-center">
                                    <form class="form-inline" action="subscribe.php" method="post">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email address">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Subscribe <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <div class="copyright"> © 2020. All Rights Reserved | Designed and Developed by<a href="index.php"> theonlinebooks.in</a></div>
                    </div>
                </div>


            </div><!-- end container -->
        <!-- end footer -->

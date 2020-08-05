<hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="single.html" title="">
                                                    <img src="upload/menu_06.jpg" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
<?php
                        $sql="SELECT * FROM articles order by rand() limit 2";
                        $youMay=mysqli_query($conn,$sql);

                        while($rowl=myqsqli_fetch_array($youMay))
                        {

                                $sql="select cat_name from category where cat_id=".$rowl['cat_id'];
                                $catName=ReturnAnyValue($conn,$sq;);
?>
                                            <div class="blog-meta">
                                                <h4><a href="#" title=""><?php echo $rowl['title'];?></a></h4>
                                                <small><a href="#" title=""><?php echo $catName;?></a></small>
                                                <small><a href="#" title=""><?php echo $rowl['post_date'];?></a></small>
                                            </div><!-- end meta -->
                                    </div><!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="/show-article.php?aid=<? echo $rowl['art_id'];?>" title="">
                                                    <img src="uploads/<?php echo $rowl['pic1'];?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </div><!-- end media -->
                                                </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                                </a>
                        <?php
                        }
                        ?> 

                                        
                                </div><!-- end row -->
                            </div><!-- end custom-box -->
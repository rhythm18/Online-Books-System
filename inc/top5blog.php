<section class="section first-section">
            <div class="container-fluid">
                <div class="row masonry-blog clearfix">
                    <?php
                        $sql="select a.*,c.cat_name from articles a,category c where a.cat_id=c.cat_id and a.status=1 order by a.art_id desc limit 3";
                        
                        $rsTop=mysqli_query($conn,$sql);
                        $i=1;
                        while($rowTop=mysqli_fetch_array($rsTop))
                        {

                            if($rowTop['user_id']==0)
                            {
                                $sql="select name from admin where admin_id=1";
                                $authorName=ReturnAnyValue($conn,$sql);
                            }
                            else
                            {
                                $sql="select first_name from users where user_id=".$rowTop['user_id'];
                                $authorName=ReturnAnyValue($conn,$sql);
                            }

                            /*if($i==1) echo "<div class=left-side >";
                            if($i==2) echo "<div class=center-side >";
                            

                            if($i==5) echo "<div class='right-side hidden-md-down' >";*/
                            
                           
                               
    ?>
                    
                      <div class=left-side>
                        <div class="masonry-box post-media">
                             <img src="uploads/<?php echo $rowTop['pic1'];?>" alt="" width="180" height="300">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="index.php?id=<?php echo $rowTop['cat_id'];?>" title=""><?php echo $rowTop['cat_name'];?></a></span>
                                        <h4><a href="show-article.php?aid=<?php echo $rowTop['art_id'];?>" title=""><?php echo $rowTop['title'];?></a></h4>
                                        <small><a href="#" title=""><?php echo $rowTop['post_date'];?></a></small>
                                        <small><a href="index.php?uid=<?php echo $rowTop['user_id'];?>" title="">by <?php echo $authorName;?></a></small>
                                    </div><!-- end meta -->

                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    <?php
                    //if($i==1 or $i==4 or $i==5) echo "</div>";
                echo "</div>";
                   
                   $i=$i+1;
                    }
                ?>
                
                </div><!-- end masonry -->
            </div>
        </section>
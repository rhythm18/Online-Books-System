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
<hr class="invis1">
<?php
$sql="select * from comments where cmt_status=1 and art_id='$id'";
                            $rsCmt=mysqli_query($conn,$sql);
                            $cntCmt=mysqli_num_rows($rsCmt);
                            
$sql="select user_id from articles where art_id='$id'";
$userID=ReturnAnyValue($conn,$sql);
?>
                            <div class="custombox clearfix">
                                <h4 class="small-title"><?php echo $cntCmt;?> Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                    <?php
                            
                            while ($rowCmt=mysqli_fetch_array($rsCmt))
                            {

                            ?>

                                            <div class="media">
                                               <!-- <a class="media-left" href="#">
                                                    <img src="upload/author.jpg" alt="" class="rounded-circle">
                                                </a>-->
                                                <div class="media-body">
                            

                            
                                                    <h4 class="media-heading user_name"><?php echo $rowCmt['name'];?> <small><?php echo $rowCmt['cmt_date'];?></small></h4>
                                                    <p><?php echo $rowCmt['comment'];?></p>
                                                    <?php
                                                    if ($rowCmt['reply']!=null) 
                                                    {
                                                    ?>
                                                        <?php 
                                                        if($userID==0) echo $repliedBy="Admin";
                                                        else
                                                        {
                                                            $sql="select first_name from users where user_id=".$userID;
                                                            
                                                            $repliedBy=ReturnAnyValue($conn,$sql);
                                                        }
                                                        ?>

                                                    <div class=""><b><?php echo $repliedBy;?></b><br>
                                                        <p><?php echo $rowCmt['reply'];?></p>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                                </div>
                                            </div>
                                <?php
                                }
                                ?>
                                            
                                            
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->
                        </div>

  <hr class="invis1">
<div class="row">
                    <div class="col-lg-9">
                        <div class="blog-list clearfix">
                            <div class="section-title">
                            </div><!-- end title -->
                
<?php 
$str1="";
if (isset($_GET['id'])) {
    $str1=" and cat_id=".$_GET['id'];
}

if (isset($_GET['uid'])) {
    $userId=$_GET['uid'];
    $str1=" and user_id=".$_GET['uid'];
}

if (isset($_SESSION['user_id'])) { $uid=$_SESSION['user_id'];}




$sql="select * from articles where status=1 ".$str1." order by art_id desc limit 10";
$rsArt=mysqli_query($conn,$sql);



while ($rowArt=mysqli_fetch_array($rsArt))
{
$str=substr($rowArt['details'],0,600);

    if($rowArt['user_id']==0)
        {
            $sql="select name from admin where admin_id=1";
            $author=ReturnAnyValue($conn,$sql);

        }
    else
        {
            $sql="select first_name from users where user_id=".$rowArt['user_id'];
            $author=ReturnAnyValue($conn,$sql);

        }
        $sql="select cat_name from category where cat_id=".$rowArt['cat_id'];
        $catName=ReturnAnyValue($conn,$sql);
?>
                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="show-article.php?aid=<?php echo $rowArt['art_id'];?>" title="">
                                            <img src="uploads/<?php echo $rowArt['pic1'];?>"  alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class=" col-md-8">

                                        <h4><a href="show-article.php?aid=<?php echo $rowArt['art_id'];?>" title=""><h2><?php echo $rowArt['title'];?></h2></a></h4>

                                    <p><?php echo $rowArt['post_date'];?>&nbsp;&nbsp;&nbsp;
                                        Pages&nbsp;<?php echo $rowArt['page_count'];?>&nbsp;&nbsp;&nbsp;
                                      <?php echo $rowArt['file_size']/1000;?> KB&nbsp;&nbsp;&nbsp;
                                      Views&nbsp;<?php echo $rowArt['views'];?>&nbsp;&nbsp;&nbsp;
                                      <?php 
                                      if (isset($_SESSION['user_id']))
                                      {
                                      $sql="select like_status from book_likes where user_id=$uid and  art_id=".$rowArt['art_id'];
                                      $lsts=ReturnAnyValue($conn,$sql);
                                      if ($lsts==1) {
                                          
                                      ?>
                                      <a href="book_like.php?sts=0&id=<?php echo $rowArt['art_id'];?>">Liked</a>
                                      <?php
                                  } else {

                                  ?>
                                  <a href="book_like.php?sts=1&id=<?php echo $rowArt['art_id'];?>">Like</a>
                                  <?php
                              }}
                              ?>


                                  </p>
                                    <?php echo $catName;?>&nbsp;&nbsp;&nbsp;
                                    
                                    By <?php echo $author;?>&nbsp;&nbsp;&nbsp;
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">
                            <?php
                        }
                        ?>
                    </div>
                
</div>
                            

                            


<hr class="invis1">
 <div class="custombox prevnextpost clearfix">
                                <div class="row">
       <?php

        $id=$_GET['aid'];

        $sql="select * from articles where art_id<$id and status=1 ORDER by articles.art_id DESC LIMIT 1
";
        $prev=mysqli_query($conn,$sql);
        while($prevRow=mysqli_fetch_array($prev))
{
        ?>

                           
                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="show-article.php?aid=<?php echo $prevRow['art_id'];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between text-right">
                                                        <img src="uploads/<?php echo $prevRow['pic1'];?>" alt="" class="img-fluid float-right">
                                                        <h5 class="mb-1"><?php echo $prevRow['title'];?></h5>
                                                        <small>Prev Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                             
<?php
}


$sql="select * from articles where art_id>$id and status=1 ORDER by articles.art_id DESC LIMIT 1
";

 $next=mysqli_query($conn,$sql);
        while($nextRow=mysqli_fetch_array($next))
{
?>
                              
                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="/show-article.php?aid=<?php echo $nextRow['art_id'];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between">
                                                        <img src="uploads/<?php echo $nextRow['pic1'];?>" alt="" class="img-fluid float-left">
                                                        <h5 class="mb-1"><?php echo $nextRow['title'];?></h5>
                                                        <small>Next Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                           

<?php
}
?>

     </div><!-- end row -->
                            </div><!-- end author-box -->
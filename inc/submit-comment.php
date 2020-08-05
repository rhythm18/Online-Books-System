  <hr class="invis1">
  
                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php 
                                        if (isset($_POST['submit'])) {
                                            $name=mysqli_real_escape_string($conn,$_POST['name']);
                                            $email=mysqli_real_escape_string($conn,$_POST['email']);
                                            $cmt=mysqli_real_escape_string($conn,$_POST['cmt']);
                                            $dt=date("Y-m-d");
                                            $sql="insert into comments (art_id,name,email,comment,cmt_date) 
                                                values ('$id','$name','$email','$cmt','$dt')";
                                            if (mysqli_query($conn,$sql)) {
                                                echo "Comment added successfully";
                                                $url="show-article.php?cmt=s&aid=".$id;
                                                gotopage($url);
                                            }
                                            else {
                                                echo "Sorry there was a problem";
                                                $url="show-article.php?cmt=f&aid=".$id;
                                                gotopage($url);
                                            }
                                            
                                        }
                                        ?>
                                        <?php 
  if (isset($_GET['cmt']) && $_GET['cmt']=="s") {
     echo "<div class='alert alert-success bm-2'>Comment Added Successfully</div>";
  }
if(isset($_GET['cmt']) && $_GET['cmt']=="f") {
echo "<div class='alert alert-danger bm-2'>Sorry there was a problem in adding your comment</div>";
}
?>
                                        <form class="form-wrapper" method="post" action="">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email address">
                                           <!-- <input type="text" class="form-control" placeholder="Website"> -->
                                            <textarea class="form-control" name="cmt" id="cmt" placeholder="Your comment"></textarea>
                                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
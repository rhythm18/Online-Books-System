<?php 
                                    $sql="select * from category";
                                    $rs=mysqli_query($conn,$sql);
                                    while ($row=mysqli_fetch_array($rs))
                                     {
                                        $c_id=$row['cat_id'];
                                        $sql="select count(*) from articles where status=1 and cat_id='$c_id'";
                                        $cnt=ReturnAnyValue($conn,$sql);
                                        echo "<li><a href='index.php?id=$c_id'>".$row['cat_name']."<span>($cnt)</span></a></li>";
                                    }
                                    ?>
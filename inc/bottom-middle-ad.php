
 <hr class="invis1">

                <div class="row">
                    <div class="col-lg-10 offset-lg-1">

                                <?php
                                        $fcontents = join ('', file ('inc/ad.txt'));
                                        $s_con = explode("~",$fcontents);
                                        $banner_no = rand(0,(count($s_con)-1));
                                        echo $s_con[$banner_no];
                                        ?>
                                <!--<img src="upload/banner_02.jpg" alt="" class="img-fluid">-->
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
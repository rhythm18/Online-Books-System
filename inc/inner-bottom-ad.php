<div class="row">
<div class="col-lg-12">
<?php
    $fcontents = join ('', file ('inc/ad.txt'));
    $s_con = explode("~",$fcontents);
    $banner_no = rand(0,(count($s_con)-1));
    echo $s_con[$banner_no];
?>
</div><!-- end col -->
</div><!-- end row -->
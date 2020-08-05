 <li class="nav-item">
   <a class="nav-link color-primary-hover" href="dashboard.php"><b style="color: #ffff00; font-size: 17px;">Dashboard</b></a>

 </li>
<li class="nav-item">
   <a class="nav-link color-primary-hover" href="my-book.php"><b style="color: #ffff00; font-size: 17px;">My Books</b></a>

 </li>
 <li class="nav-item">
   <a class="nav-link color-primary-hover" href="my-likes.php"><b style="color: #ffff00; font-size: 17px;">My Likes</b></a>

 </li>
 <li class="nav-item">
   <a class="nav-link color-primary-hover" href="my-download.php"><b style="color: #ffff00; font-size: 17px;">My Downloads</b></a>

 </li>
 
 <li class="nav-item">
   <a class="nav-link color-primary-hover" href="my-profile.php"><b style="color: #ffff00; font-size: 17px;">My Profile</b></a>

 </li>
 <?php 
 if ($_SESSION['plan']==0) 
 {
 	?>
 	<li class="nav-item">
   <a class="nav-link color-primary-hover" href="upgrade.php"><b style="color: #ffff00; font-size: 17px;">Upgrade</b></a>
    </li>
    <?php
 }
else
{

}
?>
<li class="nav-item">
   <a class="nav-link color-primary-hover" href="change-pass.php"><b style="color: #ffff00; font-size: 17px;">Change Password</b></a>

 </li>
 <li class="nav-item">
   <a class="nav-link color-primary-hover" href="logout.php"><b style="color: #ffff00; font-size: 17px;">Logout</b></a>

 </li>



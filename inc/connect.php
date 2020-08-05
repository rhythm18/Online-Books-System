<?php
 date_default_timezone_set("Asia/Calcutta");
 $server="local";
 if($_SERVER['SERVER_NAME']=="localhost")
 {
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$databasename="online_books";
}

else
{
$servername = "localhost";
	$username = "books_user";
	$password = "DqTk{o!Nzbbs";
	$databasename="online_books";
}

$domain="http://theonlinebooks.in/";
$domainName="theonlinebooks.in";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$databasename);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
function gotopage($url)
{
	echo "<script language=\"javascript\">";
	echo "window.location = '".$url."'; \n";
	echo "</script>";
}


function ReturnAnyValue($con,$Ssql){
	//firequery($Ssql);
	$TempRst = mysqli_query($con,$Ssql);
	$EOF = @mysqli_num_rows($TempRst);
	if ($EOF != 0){
		$TempRow = mysqli_fetch_row($TempRst);
		$Retun = $TempRow[0];
	}else{
		$Retun = "";
	}
	return $Retun;
}

function socialsharingbuttons($social='', $params=''){
  $button= '';
  switch ($social) {
   case 'facebook':
    $button='http://www.facebook.com/share.php?u='. $params['url'];
    break;
   case 'twitter':
    $button='https://twitter.com/share?url='.$params['url'].'&amp;text='. $params['title'] .'&amp;hashtags='. $params['tags'];
    break;
   case 'google-plus':
    $button='https://plus.google.com/share?url='. $params['url'];
    break;
   case 'whatsapp':
    if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
     $button='whatsapp://send?text='. $params['url'];
    }else{
     $button='https://web.whatsapp.com/send?text='. $params['url'];
    }
    break;
   case 'linkedin':
    $button='http://www.linkedin.com/shareArticle?mini=true&amp;url='. $params['url'];
    break;
   default:
    break;
  }
  return $button;      
 }
?>
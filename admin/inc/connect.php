<?php
 date_default_timezone_set("Asia/Calcutta");
 $server="local";
 if($_SERVER['SERVER_NAME']=="localhost")
 {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename="books";
}

else
{
$servername = "localhost";
	$username = "books_user";
	$password = "DqTk{o!Nzbbs";
	$databasename="online_books";
}

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
?>
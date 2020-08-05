<?php  
if((isset($_POST["name"]) && !empty($_POST["name"])) && (!empty($_POST['email']) && isset($_POST["email"])))
{
	  $name=$_POST["name"];
	  $email=$_POST["email"];
	  $msg=$_POST["message"];
	  //$mobile=$_POST["mobile"];
	  $subject = 'Enquiry For Dhanyog';
	 // $gender=$_POST["gender"];
	  
	  $message = $name.'<br>';
	  //$message .= $gender.'<br/>';
	  $message .= $email.'<br>';
	  $message .= $msg.'<br/>';
	  
	  $to_email = 'pcsaini@gmail.com';
	  $from_email="admin@getdailyincome.in";
	 /* $dt=date("Y-m-d");
	  $con = mysqli_connect("localhost","friend_user","Modi@2018","friend_db");
	  $sql="INSERT INTO users(name, email, mobile, gender,status, reg_date) values
	        ('$name','$email','$mobile','$gender','0','$dt')";
	  mysqli_query($con,$sql);	*/	
	  
	  $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	  $headers .= 'From: '.$from_email;
	  mail($to_email,$subject,$message,$headers);
	  echo "s";
	
}else{
	
	echo "n";
}
	
?>
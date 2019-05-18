<html>
<head>
<title>contact form Design</title>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="contact-form">
<h2>CONTACT US</h2>
<form method ="post" action="">
     <input type="text" name="name" placeholder="your name " required>
	 <input type="text" name="phone" placeholder="phone no." required>
	 <input type="text" name="email" placeholder="email " required>
	 <textarea  name="message" placeholder=" your massage " required></textarea>
	 
	  <div class="g-recaptcha" data-sitekey="6LcqBKEUAAAAAGtHyYnFoYFPNL50LJVMAFpiHz_w"></div>
	 <input type="submit" name="submit"  value="send message" class="submit-btn">
</form>	 
<div class="status">  

<?php 
if(isset($_post['submit']))	
{
	$user_name= $_post['name'];
	$phone= $_post['phone'];
	$email= $_post['email'];
	$message= $_post['message'];
	
	
	$email_from= 'noreply@gmail.com';
	$email_subject= "NEw form Submission";
	$email_body= "Name: $user_name.\n".
	             "Phone: $phone.\n".
				 "Email id: $user_email.\n".
				 "User message: $user_message.\n".
				 
				 
	$to_email="sandeepjais728@gmail.com";
    $headers="from: $email_from\r\n";
    $headers.="Reply-to: $user_email\r\n";

    $secretkey="66LcqBKEUAAAAAHqTf_1-W7ml8M7_azKGe6VyB4EV";
    $responsekey=$post['g-recaptcha-response'];
	$userip=$_server['REMOTE_ADDR'];
	$url="https://www.google.com/recaptcha/api/siteverifyS'?secret=$Secretkey&response=$responsekey&remoteip=$userip";
	
	$response=file_get_content($url);
	$response=json_decode($response);
	
	
	if($response->success)
	{
		mail($to_email,$email_subject,$email_body,$headers);
		echo "message sent successfully";
		
	}
	else
	{
		echo "<span>Invalid Captcha, Plrase Try Again</span>";
	}
}
?> 

</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "contact";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$databasename);

// Check connection
if (!$conn)
	{
    die("Connection failed: " . mysqli_connect_error());
	}
echo "Connected successfully";

if(isset($_post['submit']))	
{
	echo "qwerrrrt";
	$user_name= $_post['name'];
	$phone= $_post['phone'];
	$email= $_post['email'];
	$message= $_post['message'];
	
	echo "huiuytutyry";
	//$sql = "INSERT INTO contact(name, phone, email,message)
//VALUES ('$user_name', '$phone', '$email',''$message)";

//if ($conn->query($sql) === TRUE) {
  //  echo "New record created successfully";
//}
 //else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
    $sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) 
{
    echo "Database created successfully";
} else
	{
    echo "Error creating database: " . $conn->error;
}
}
$conn->close();
?>
</div>
</body>
</html>
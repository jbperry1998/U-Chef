<?php
//session_start();

$db_connection = pg_connect("host=ec2-107-21-125-211.compute-1.amazonaws.com
 port=5432 dbname=dklt353ih2mrc user=osduvaztmivaka password=b4846020edb6da15efb7cc45ee5f45127c761cc4884a8479ec6ae8d7a2b5a138
");
//$username = $_POST['username'];
$email = $_POST['email'];
$address = $_POST['address'];
//$password = $_POST['password'];
//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$city = $_POST['city'];
$zip = $_POST['zip'];
$state = $_POST['state'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

//$query = "SELECT* FROM customers WHERE username='$username' OR email='$email'";
//$result = pg_query($db_connection,$query);
//$user = pg_fetch_assoc($result);


//if(!$user) {
$query_1 = "INSERT INTO customers VALUES('$first_name','$last_name','$email','$address','$city','$state','$zip')";
$result_1 = pg_query($db_connection,$query_1);
    
    //$_SESSION['username'] = $username;
    //$_SESSION['email'] = $email;
    //$_SESSION['logged_in'] = "logged_in";
    
	//change to homepage for members
	
	$send_email = 'jbperry1998@gmail.com';
	//$send_password = '@Hoocooks19';
	//session_start();
	//$email = $_SESSION['email'];
	//$product = $_SESSION['product'];
	$message = "Thank you for signing up! We are still perfecting out system,  but we will be sure to contact you when service begins." ;
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		use PHPMailer\PHPMailer\SMTP;
		
		/* Include the Composer generated autoload.php file. */
		require 'vendor/autoload.php';
		
		/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
		$mail = new PHPMailer(TRUE);
		$mail->isSMTP();
	//Enable SMTP debugging
	// SMTP::DEBUG_OFF = off (for production use)
	// SMTP::DEBUG_CLIENT = client messages
	// SMTP::DEBUG_SERVER = client and server messages
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption mechanism to use - STARTTLS or SMTPS
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
		
		/* Open the try/catch block. */
		try {
		   /* Set the mail sender. */
		   $mail->Username = 'jbperry1998@gmail.com';
		   //Password to use for SMTP authentication
		   $mail->Password = 'stealers6598';
		   $mail->setFrom($send_email, 'U-Chef');
		
		   /* Add a recipient. */
		   $mail->addAddress($email);
		
		   /* Set the subject. */
		   $mail->Subject = "Sign Up Confirmation";
		
		   /* Set the mail message body. */
		   $mail->Body = $message;
		
		   /* Finally send the mail. */
		   $mail->send();
		}
		catch (Exception $e)
		{
		   /* PHPMailer exception. */
		   echo $e->errorMessage();
		}
		catch (\Exception $e)
		{
		   /* PHP exception (note the backslash to select the global namespace Exception class). */
		   echo $e->getMessage();
		}
header('Location: index.html');
//}else{
  //  header('Location: user_exists.html');
//}



?>
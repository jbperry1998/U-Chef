<?php
session_start();

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
    header('demo.html');
//}else{
  //  header('Location: user_exists.html');
//}



?>
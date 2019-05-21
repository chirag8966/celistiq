<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_NAME', 'celistiq');
define('DB_USER','root');
define('DB_PASS','');

//Create a database connection
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
if (!$conn) {
    die("Database connection failed");
}

//Select a database to use
$db_select = mysqli_select_db($conn,DB_NAME);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error($conn));
}

	$username = $_POST['name'];
	$email = $_POST['email'];
  $contact = $_POST['contact'];
	$password =  md5($_POST['password']);

  $check_email = mysqli_query($conn, "SELECT email FROM users where email = '$email' ");
  if(mysqli_num_rows($check_email) > 0){
      echo('user already exists');
  }else{
    $reg = "insert into users(username,email,contact,password) values('$username','$email','$contact','$password')";
    mysqli_query($conn,$reg);
    echo "registration successfull";
    echo "<a href='../index.html'>Please login here</a>";

  }

?>

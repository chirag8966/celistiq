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

	$email = $_POST['email'];
	$password =  md5($_POST['password']);

  $sql = "select * from users where email ='".$email."' && password = '".$password."'limit 1";
  $result=mysqli_query($conn,$sql);

  if(mysqli_num_rows($result)==1){
      echo " You Have Successfully Logged in";
	$query = "SELECT * FROM users"; //You don't need a ; like you do in SQL
	$result = mysqli_query($conn,$query);

	echo "<table>"; // start a table tag in the HTML

	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	echo "<tr><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td></tr>";  //$row['index'] the index here is a field name
	}

	echo "</table>"; //Close the table in HTML
      exit();
  }
  else{
      echo " You Have Entered Incorrect Password";
      exit();
  }


?>

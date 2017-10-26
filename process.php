<?php
ob_start();
session_start();

//check if already logged in
//if( $user->is_logged_in() ){ header('Location: index.php'); } 

//Get values from form in login.php file
$username = $_POST['user'];
$password = $_POST['pass'];

//connect to the server and select database
$con = mysqli_connect("lamp.scim.brad.ac.uk", "lpcovaje", "Alegria3");
mysqli_select_db($con, 'lpcovaje') or die(mysqli_error($con));


//prevent mysql injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

//Query the database for user
$result = mysqli_query($con, "select * from users where username = '$username' and password = '$password'")
            or die("Failed to query database " .mysqli_error($con));
$row = mysqli_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password ){
    header("Location: index.php");
} else {
    echo "Login failed!";
}
$user = new User($con);
?>


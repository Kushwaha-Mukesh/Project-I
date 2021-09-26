<?php

// start session
session_start();
// connect to database
include('connection.php');
// check user inputs
  // if error then print error message
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$missingPassword = '<p><strong>Please enter your password!</strong></p>';

// Get email and password
if(empty($_POST["loginemail"])){
    $resultMessage = '<div class="alert alert-danger">' . $missingEmail .'</div>';
    echo $resultMessage; 
}else{
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_EMAIL);
}

if(empty($_POST["loginpassword"])){
    $resultMessage = '<div class="alert alert-danger">' . $missingPassword .'</div>';
    echo $resultMessage; 
}else{
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);
}

// if No errors
//   Prepare variable for the queries
$email = mysqli_real_escape_string($link, $email);

$password = mysqli_real_escape_string($link, $password);
//md5 is a hashing function. That hash the password and store password in 128bit hexadecimal.
// $password = md5($password);
$password = hash('sha256', $password);

//Run query: check combination of email and password exists
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND activation='activated'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error, running the query.</div>';
    echo '<div class="alert alert-danger">' . mysqli_query($link, $sql) .'</div>';
    exit;
}
$count = mysqli_num_rows($result);
if($count !== 1){
   echo '<div class="alert alert-danger">Wrong Username or Password</div>';
}else{
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $_SESSION['user_id']=$row['user_id'];
   $_SESSION['username']=$row['username'];
   $_SESSION['email']=$row['email'];

   if(empty($_POST['rememberme'])){
       // if remember me is not checked
      echo "success";
   }else{
       // if remember me is checked
       // create two variables 
       $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
       $authentificator2 = openssl_random_pseudo_bytes(20);
       
       // store them in a cookie
       function f1($a, $b){
           $c = $a . "," . bin2hex($b);
           return $c;
       }
       $cookieValue = f1($authentificator1,$authentificator2);
       setcookie(
           "rememberme",
           $cookieValue,
           time() + 1296000
       );

       // Run the query to store them in a rememberme table
       function f2($a){
           $b = hash('sha256', $a);
           return $b;
       }
       $f2authentificator2 = f2($authentificator2);
       $user_id = $_SESSION['user_id'];
       $expiration = date('Y-m-d H:i:s', time() + 1296000);
       $sql = "INSERT INTO rememberme (`authenticator1`, `f2authenticator2`, `user_id`, `expires`) VALUES ('$authentificator1', '$f2authentificator2', '$user_id', '$expiration')";
       $result = mysqli_query($link, $sql);
       if(!$result){
           echo '<div class="alert alert-danger">There was an error in running the query.</div>';
       }else{
        echo "success";
       }
    }
}

?>
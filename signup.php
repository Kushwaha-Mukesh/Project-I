<?php
//    start session
session_start();

// connect to database
include('connection.php');

$missingUsername='<p><strong>Please enter a username!</strong></p>';
$missingEmail='<p><strong>Please enter your email address!</strong></p>';
$invalidEmail='<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword='<p><strong>Please enter a password!</strong></p>';
$invalidPassword='<p><strong>Your password should be 6 character long and contains at least one capital letter and one number!</strong></p>';
$differentPassword='<P><strong>Your password does not match!</strong></P>';
$missingPassword2='<p><strong>Please conform your password!</strong></p>'; 

// Get username, password, email, password2

// Get username
if(empty($_POST["username"])){
    $resultMessage = '<div class="alert alert-danger">' . $missingUsername .'</div>';
    echo $resultMessage;
}else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}

// GEt email
if(empty($_POST["email"])){
    $resultMessage = '<div class="alert alert-danger">' . $missingEmail .'</div>';
    echo $resultMessage; 
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $resultMessage = '<div class="alert alert-danger">' . $invalidEmail .'</div>';
        echo $resultMessage;
    }
}

// Get passwords
if(empty($_POST["password1"])){
    $resultMessage = '<div class="alert alert-danger">' . $missingPassword .'</div>';
    echo $resultMessage;

    //  checking the pattern of the password
}elseif(!(strlen($_POST["password1"])>6 and preg_match('/[A-Z]/', $_POST["password1"]) and preg_match('/[0-9]/', $_POST["password1"]))){
    $resultMessage = '<div class="alert alert-danger">' . $invalidPassword .'</div>';
    echo $resultMessage;
}else{
    $password = filter_var($_POST["password1"], FILTER_SANITIZE_STRING);
    if(empty($_POST["password2"])){
        $resultMessage = '<div class="alert alert-danger">' . $missingPassword2 .'</div>';
        echo $resultMessage;
    }else{
         $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);

        //  check if password are same or not
         if($password !== $password2){
            $resultMessage = '<div class="alert alert-danger">' . $differentPassword .'</div>';
            echo $resultMessage;
         }
    }
}

// if No errors
//   Prepare variable for the queries
$username = mysqli_real_escape_string($link, $username);

$email = mysqli_real_escape_string($link, $email);

$password = mysqli_real_escape_string($link, $password);
//md5 is a hashing function. That hash the password and store password in 128bit hexadecimal.
// $password = md5($password);
$password = hash('sha256', $password);

// if username already exists in the table, then print error
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error, running the query.</div>';
    echo '<div class="alert alert-danger">' . mysqli_query($link) .'</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">Username is already exists!</div>';
    exit;
}

//  if email exists in the table, then print error.
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error, running the query.</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">email is already exists!</div>';
    exit;
}

// creating a unique activation code.
$activationkey = bin2hex(openssl_random_pseudo_bytes(16));
  //16 byte = 16*8=128
  //we need to convert binary into hexadecimal
  // that will be the 32 characters. so we allocate the size of
  // activation key 32 in the table.

  //insert user detail in the table users

  $sql = "INSERT INTO users (`username`, `email`, `password`, `activation`) VALUES ('$username', '$email', '$password', '$activationkey')";
  $result = mysqli_query($link, $sql);
  if(!$result){
      echo '<div class="alert alert-danger">There is an error inserting into the table!</div>';
      exit;
  }

//   send the user an email containing link to activate.php with their email and activation code
$message = "Please click the link to activate your account:\n\n";
$message .= "http://localhost/Project-I/activate.php?email=" . urlencode($email) . "&key=$activationkey";
if(mail($email, 'Conform your Registeration', $message, 'From:'.'adhikarymaruti@gmail.com')){
    echo "<div class='alert alert-success'>Thank you for the registering!
     A conformation email has been sent to $email. 
     Please click on the link to activate your account.</div>";
}


?>
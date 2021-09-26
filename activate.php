<?php

// The user is redirected to this file after clicking the activation link
//Signup link contains two get parameters: email and activation key
session_start();
include('connection.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Account Activation</title>
  </head>
  <body>

  <div class="container-fluid">
      <div class="row">
          <div class="col-sm">

      <h1>Account Activation:</h1>

      <?php

       // if the email or activation key is missing show an error
if(!isset($_GET['email']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger">There was an error. Please click on the link that you received by the email.</div>';
    exit;
}

// if not missing any of the parameter, Store the in a variable
$email = $_GET['email'];
$key = $_GET['key'];

// prepare variable for the query
$email = mysqli_real_escape_string($link, $email);
$key = mysqli_real_escape_string($link, $key);

// Run Query: set activation field to "Activated" for the provided email
$sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
$result = mysqli_query($link, $sql);
if(mysqli_affected_rows($link) == 1){
    //success message
    echo '<div class="alert alert-success">Your account has been activated.</div>';
    echo '<a href="index.php" type="button" class="btn btn-primary">Log In</a>';
}else{
    // show error message
    echo '<div class="alert alert-danger">Your account could not be activated. Please try again later!</div>';
}

      ?>
         </div>
     </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="jQuery.js"></script>
    <script src="index.js"></script>
  </body>
</html>
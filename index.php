<?php

session_start();
include('connection.php');

//logout
include('logout.php');

// remember me 
include('remember-me.php');

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
    <link rel="stylesheet" href="index.css">

    <title>Online Notes</title>
  </head>
  <body>

  <!-- Navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
   
   <div class="container-fluid">
     <a class="navbar-brand" href="#">Online Notes</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarScroll">
         <ul class="navbar-nav">
             <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Help</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Contact Us</a>
             </li>
         </ul>

         <ul class="navbar-nav ml-auto">
              <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#loginmodal" data-toggle="modal" data-target="#loginmodal">Log In</a>
              </li>
        </ul>
 
  </div>

</div>
</nav>
   
   <!-- jumbotron -->
  <div class="jumbotron" id="mycontainer">
      <h1>Online Notes Platform</h1>
      <p><strong>Your notes with you wherever you go.</strong></p>
      <p><strong>Easy to use, Protect all your Notes.</strong></p>
  <button class="btn btn-primary btn-lg button" type="button" data-toggle="modal" data-target="#signupmodal">
    Sign-Up, Its Free
  </button>
  </div>

  <!-- Sign-Up Form -->
        <form action="post" id="signupform">

        <div class="modal fade" id="signupmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Sign Up today and start using our Online Notes App!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             <div class="modal-body">
                  <!-- sign up message  -->
                     <div id="signupmessage"></div>

                  <div class="form-group">
                       <label for="username" class="sr-only">Username:</label>
                      <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                  </div>
                  <div class="form-group">
                       <label for="email" class="sr-only">Email:</label>
                      <input type="email" class="form-control" placeholder="Email Address" name="email" id="email">
                  </div>
                  <div class="form-group">
                       <label for="passwd1" class="sr-only">Choose a password:</label>
                      <input type="password" class="form-control" placeholder="Choose a Password" name="password1" id="passwd1">
                  </div>
                  <div class="form-group">
                       <label for="passwd2" class="sr-only">Conform password:</label>
                      <input type="password" class="form-control" placeholder="Conform password" name="password2" id="passwd2">
                  </div>

             </div>
             <div class="modal-footer">
               <input type="submit" class="btn btn-primary" value="Sign up" name="signup">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
             </div>
          </div>
         </div>
       </div>  

    </form>

    <!-- Login Form -->

    <form action="post" id="loginform">

<div class="modal fade" id="loginmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
     <div class="modal-body">
          <!-- Login message  -->
             <div id="loginmessage"></div>

          <div class="form-group">
               <label for="loginemail" class="sr-only">Email:</label>
              <input type="email" class="form-control" placeholder="Email" name="loginemail" id="loginemail">
          </div>
          <div class="form-group">
               <label for="loginpasswd" class="sr-only">Password:</label>
              <input type="password" class="form-control" placeholder="Password" name="loginpassword" id="loginpasswd">
          </div>

          <div class="checkbox">
            <label for=""><input type="checkbox" name="rememberme" id="rememberme">
              Remember Me
            </label>
            <a href="" class="float-right" style="cursor: pointer;" data-dismiss="modal" data-toggle="modal" data-target="#forgotpasswordmodal">Forgot Password?</a>
          </div>

     </div>
     <div class="modal-footer">
     <button type="button" class="btn btn-secondary float-left" data-dismiss="modal" data-toggle="modal" data-target="#signupmodal">Register</button>
       <input type="submit" class="btn btn-primary" value="Login" name="Login">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
     </div>
  </div>
 </div>
</div>  

</form>

    <!-- Forgot Password form -->
    <form action="post" id="forgotpasswordform">

<div class="modal fade" id="forgotpasswordmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Forgot Password? Enter your email address:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
     <div class="modal-body">
          <!-- Forgot Password message  -->
             <div id="forgotpasswordmessage"></div>

          <div class="form-group">
               <label for="forgotemail" class="sr-only">Email:</label>
              <input type="email" class="form-control" placeholder="Email" name="forgotemail" id="forgotemail">
          </div>
     </div>
     <div class="modal-footer">
     <button type="button" class="btn btn-secondary float-left" data-dismiss="modal" data-toggle="modal" data-target="#signupmodal">Register</button>
       <input type="submit" class="btn btn-primary" value="Submit" name="forgotpassword">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
     </div>
  </div>
 </div>
</div>  

</form>
  
   <!-- footer -->
  <div class="footer">
     <div class="container">
    <p>Developed by R2M</p>
     </div>
  </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="jQuery.js"></script>
    <script src="index.js"></script>
  </body>
</html>
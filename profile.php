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

    <title>Profile</title>
  </head>

   <style>
       .profilesetting{
             margin-top: 120px;
         }
         tr{
           cursor: pointer;
         }
   </style>

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
                <a class="nav-link active" aria-current="page" href="#">Profile</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Help</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Contact Us</a>
             </li>
             <li class="nav-item active">
                 <a class="nav-link active" href="mainpage.php">My Notes</a>
             </li>
         </ul>

         <ul class="navbar-nav ml-auto">
         <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Logged in as <b>username</b></a>
              </li>
              <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Log out</a>
              </li>
        </ul>
 
  </div>

</div>
</nav>
   
        <div class="container profilesetting">
              <div class="row">
                 <div class="col-sm">
                    <h2>General Account Setting:</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <tr data-target="#updateusername" data-toggle="modal">
                                <td>Username</td>
                                <td>value</td>
                            </tr>
                            <tr data-target="#updateemail" data-toggle="modal">
                                <td>Email</td>
                                <td>value</td>
                            </tr>
                            <tr data-target="#updatepassword" data-toggle="modal">
                                <td>Password</td>
                                <td><b>❔❔❔❔❔❔</b></b></td>
                            </tr>
                        </table>
                    </div>
                 </div>
              </div>
        </div>

  <!-- Update Username modal -->
        <form action="post" id="updateusernameform">

        <div class="modal fade" id="updateusername" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Username:</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             <div class="modal-body">
                  <!-- sign up message  -->
                     <div id="signupmessage"></div>

                  <div class="form-group">
                       <label for="username">Username:</label>
                      <input type="text" class="form-control" name="username" id="username" maxlength="30" value="usernamevalue">
                  </div>

             </div>
             <div class="modal-footer">
               <input type="submit" class="btn btn-primary" value="Submit" name="updateusername">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
             </div>
          </div>
         </div>
       </div>  

    </form>

    <!-- Update Email -->

    <form action="post" id="updateemailform">

        <div class="modal fade" id="updateemail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit new email:</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             <div class="modal-body">
                  <!-- sign up message  -->
                     <div id="signupmessage"></div>

                  <div class="form-group">
                       <label for="email">Email:</label>
                      <input type="email" class="form-control" name="email" id="email" value="useremail">
                  </div>

             </div>
             <div class="modal-footer">
               <input type="submit" class="btn btn-primary" value="Submit" name="updateemail">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
             </div>
          </div>
         </div>
       </div>  

    </form>
    <!-- Update password form -->
    <form action="post" id="updatepasswordform">

<div class="modal fade" id="updatepassword" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Enter Current and New Password:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
     <div class="modal-body">
          <!-- Forgot Password message  -->
             <div id="forgotpasswordmessage"></div>

          <div class="form-group">
               <label for="currentpassword" class="sr-only">Your current password:</label>
              <input type="password" class="form-control" placeholder="Your current password" name="currentpassword" id="currentpassword">
          </div>
          <div class="form-group">
               <label for="password" class="sr-only">Choose a password:</label>
              <input type="password" class="form-control" placeholder="Choose a password" name="password" id="password">
          </div>
          <div class="form-group">
               <label for="password2" class="sr-only">Confirm password:</label>
              <input type="password" class="form-control" placeholder="Confirm password" name="password2" id="password2">
          </div>
     </div>
     <div class="modal-footer">
       <input type="submit" class="btn btn-primary" value="Submit" name="updatepassword">
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

  </body>
</html>
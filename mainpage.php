<?php
// restart session
  session_start();

  $user = $_SESSION['username'];
  // if we click back button on the browser then it take use to mainpage. so to avoid that we do following
  if(!isset($_SESSION['user_id'])){
    header("location: index.php");
  }
  
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

    <title>My Notes</title>
    <style>
       .note{
         position: absolute;
         top: 150px;
         left: 200px;
       }
       .notes{
         margin: 10px;
       }
    </style>

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
                <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Help</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Contact Us</a>
             </li>
             <li class="nav-item active">
                 <a class="nav-link" href="#">My Notes</a>
             </li>
         </ul>

         <ul class="navbar-nav ml-auto">
         <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Logged in as <b><?php echo $user; ?></b></a>
              </li>
              <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?logout=1">Log out</a>
              </li>
        </ul>
 
  </div>

</div>
</nav>

    <!-- content -->
    <div class="container note">
      <a href="upload.php" class="btn btn-primary">Add Note</a>
      
       <div class="row">
         <?php 
              include('connection.php');
              $sql = "SELECT * FROM notes";
              $result = mysqli_query($link, $sql);
              while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
                   $name = $row['notes_name'];
                ?>

               <div class="col-md-4 notes">
                 <a href="<?php echo 'upload/'.$name; ?>" target="_blank"><?php echo $name; ?></a>
               </div>
             <?php } ?>
       </div>
    </div>
   

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
<?php

include('connection.php');
if(isset($_POST['Add'])){
    // $name = $_FILES['file'];
    // echo "<pre>";
    // print_r($name);
    // exit();
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $temp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_destination = "upload/".$file_name;

    if(move_uploaded_file($temp_name, $file_destination)){
        $sql = "INSERT INTO notes (notes_name) VALUES ('$file_name')";
        if(mysqli_query($link, $sql)){
              $success = "Note Uploaded.";
        }else{
            $failed = "Error uploading the note!";
        }
    }else{
        $error = "Please select a note to upload!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Upload Note</title>

</head>
    <body> 
    
    <div class="container">
        <h3>Choose your note to upload!</h3>
        <div class="col-lg">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                </div>

                <?php if(isset($success)){ ?>
                     <div class="alert alert-success"> 
                       <?php  echo $success; ?>
                     </div>
                 <?php } ?>

                <?php if(isset($failed)){ ?>
                     <div class="alert alert-danger"> 
                       <?php  echo $failed; ?>
                     </div>
                 <?php } ?>

                 <?php if(isset($error)){ ?>
                     <div class="alert alert-danger"> 
                       <?php  echo $error; ?>
                     </div>
                 <?php } ?>

                <input type="submit" name="Add" value="Add Note" class="btn btn-primary">

            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>
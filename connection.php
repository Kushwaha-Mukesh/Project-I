<?php

// connect to database
$link = mysqli_connect("localhost:3306", "root", "", "onlinenotes");
if(!$link){
    die("Error, Unable to connect. " .mysqli_connect_error());
}

?>
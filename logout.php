<?php
session_start();
?>
<?php

$user=$_SESSION['loginUser'];

$conn = mysqli_connect('localhost','root','1598753','mydatabase');
 if(!$conn){
        echo 'Connection error' .mysqli_connect_error();
}

 $q = "UPDATE Registration SET status= 0 WHERE username = '$user'";
       mysqli_query($conn,$q);
       


session_destroy();
header('location:index.php');
?>
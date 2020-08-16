<?php

if (isset($_GET['vkey'])){

    $vkey = $_GET['vkey'];

   $conn = mysqli_connect('localhost','root','1598753','mydatabase');
   if(!$conn){
        echo 'Connection error' .mysqli_connect_error();
     }
   $q = "SELECT `vkey`,`verify` FROM `Registration` WHERE verify = 0 AND vkey= '$vkey'";
   $result= mysqli_query($conn,$q);

   if ($result->num_rows ==1)
   {
   $z= "UPDATE `Registration` SET `verify`= 1 WHERE vkey = '$vkey' ";
   mysqli_query($conn,$z);
   echo  mysqli_error($conn);
   echo "successfully verify";
   }
    else{
      echo "already verifyed";

   }
}
else{
   echo "wrong";
}






?>
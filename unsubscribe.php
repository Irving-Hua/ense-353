<?php
session_start();
?>


<?php


if (isset($_GET['movieID']))
{
  $movieID = $_GET['movieID'];
  $user = $_SESSION['loginUser'];
}
else
{
echo "wrong";
}


   $conn = mysqli_connect('localhost','root','1598753','mydatabase');

   $sql = "DELETE FROM `API_movieDB` WHERE `MovieID`='$movieID' AND `subscirber`='$user' AND `originalID` =0 ";
   mysqli_query($conn,$sql);

   echo mysqli_error($conn);
      
   sleep(1);
   header('Location: https://huax.ursse.org/mySubscription.php');


?>
<?php
session_start();
$conn = mysqli_connect('localhost','root','1598753','mydatabase');
 if(!$conn){
        echo 'Connection error' .mysqli_connect_error();
     }


 $user = $_POST['user'];

 $password = $_POST['password'];

 $_SESSION['loginUser'] = $user ;

 

 $username_query = " SELECT * FROM  Registration WHERE username = '$user' && password = '$password' ";
 $result = mysqli_query($conn,$username_query);

 $num = mysqli_num_rows($result);


 $verify_query = " SELECT * FROM  Registration WHERE username = '$user'";
 $result2 = mysqli_query($conn,$verify_query);

 $verify = mysqli_fetch_assoc( $result2);
 $verified = $verify['verify'];
    if ($verified == 1)
    {
    
  
      if ($num == 1)
      {
       $q = "UPDATE Registration SET status= 1 WHERE username = '$user'";
       mysqli_query($conn,$q);          
       header('location:home.php');

      }
      else if($num ==0 ){
       echo "Unvalid username or password";
     }
     }
     else
     {
       echo "not verified";
     }
    
?>
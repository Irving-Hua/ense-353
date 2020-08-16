<?php
session_start();
?>
<?php
$conn = mysqli_connect('localhost','root','1598753','mydatabase');
 if(!$conn){
        echo 'Connection error' .mysqli_connect_error();
}

if (isset($_POST['user']))
{

 $user = $_POST['user'];
 $password = $_POST['password'];
 $email = $_POST['email'];
 $vkey = md5(time());


   $_SESSION['email'] = $email;
   $_SESSION['vkey'] = $vkey;
   $_SESSION['user'] = $user;

 $username_query =" select * from  Registration where username = '$user' ";
 $result = mysqli_query($conn,$username_query);
  $num = mysqli_num_rows($result);
  
      if ($num == 1)
      {
       echo "username already registered";
       }
       else{
       $register = " insert into `Registration`(`username`, `password`, `email`, `vkey`) values ('$user','password','email','$vkey')";
       mysqli_query($conn, $register);
       echo "hi".mysqli_error($conn);

      echo '<a href = "https://huax.ursse.org/send_email.php">verify your email</a>';
       }
}

else
  {
  echo "invalid register";
  }

?>
    

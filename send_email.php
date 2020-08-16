<?php  
session_start();
?>
<?php
if (isset( $_SESSION['email']))
{
$to = $_SESSION['email'];
$vkey = $_SESSION['vkey'];
$user = $_SESSION['user'];
}

$conn = mysqli_connect('localhost','root','1598753','mydatabase');
 if(!$conn){
        echo 'Connection error' .mysqli_connect_error();
     }
//send email
    $subject = "Email Verification";
    $message = "<a href='https://huax.ursse.org/verify.php?vkey=$vkey'>.Verify Your Email.</a>";
    $header = "From: huaxi202@ursse.org \r\n" ;
    mail($to,$subject,$message,$header);


 $verify_query = " SELECT * FROM  Registration WHERE username = '$user'";
 $result2 = mysqli_query($conn,$verify_query);
 $verify = mysqli_fetch_assoc( $result2);
 $verified = $verify['verify'];
 
    if ($verified == 1){
      header('location:index.php');
     }
     else
     {
       echo "processing";
       header("Refresh:4");
     }
?>
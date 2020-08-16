
<?php
  session_start();
?>
<?php
function geturl($url)
{
      $headerArray = array("Content-type:application/json;","Accept:application/json");
      $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch,CURLOPT_HEADER,0);

      $output = curl_exec($ch);
      echo curl_error($ch);
      curl_close($ch);
    //$output = json_decode($output,true);
      return $output ;
}
?>

<html>
<head>
<style>

</style>
<title>Home Page</title>
</head>
<body>
<h1>welcome <?php echo $_SESSION['loginUser']; ?>
<a href ="logout.php">Logout</a>
<a href = "mySubscription.php">My subsription</a>
</h1></body>
</html>

<?php

       
      $conn = mysqli_connect('localhost','root','1598753','mydatabase');

     if(!$conn){
        echo 'Connection error' .mysqli_connect_error();
     }
      $user =  $_SESSION['loginUser'];

       $_SESSION['loginUser']= $user ;
      $sql ="SELECT `MovieID` FROM `API_movieDB` where `originalID` = 1";
      
       
      $result = mysqli_query($conn,$sql);
      
      $api_key = "67419e1d10dc2cb366bee574535e9af3";

  
     while( $movieID = mysqli_fetch_assoc($result))
     {
         $movies =  implode("",$movieID);
	 
         $s ="SELECT `MovieID` FROM `API_movieDB` where `subscirber` = '$user'";
         $r = mysqli_query($conn,$s);
	 $temp = 0;
         while ( $checkID = mysqli_fetch_assoc($r))//to decide is this movie has been subscribed
	 {
                 if ($checkID['MovieID'] == $movies)
		 {
                    $temp = 1; //if already subscribed set temp =1 will not show on web page
                 }
         }

         if($temp == 0)
	 {

        $url = "https://api.themoviedb.org/3/movie/$movies?api_key=$api_key";
        $myobj = json_decode(geturl($url));

	$img = $myobj->poster_path;
        $imgurl = "https://image.tmdb.org/t/p/w500".$img;       
	//echo  $imgurl;
        echo "<div>";
        echo "<p>".$myobj->title."</p>";
	echo "<p>";
        echo  '<a href=" https://huax.ursse.org/subscribe.php?movieID='.$movies.'">Subscribe</a>';
        echo "</p>";

/*	echo '<form action = "subscribe.php" method = "post">';
	echo '<button type ="submit" >Subscribe</button>';
	echo "</p>";
	echo "</form>";*/

        echo '<img src = "'.$imgurl.'" width = "200"  height = "200">';        
        echo "</div>";
	}
}
?>

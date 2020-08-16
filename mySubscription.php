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

<?php

    echo '<a href = "https://huax.ursse.org/home.php">Back to home</a>';
    echo "<h1>";
    echo "Subsribed Movies:";
    echo "</h1>";

 $conn = mysqli_connect('localhost','root','1598753','mydatabase');

     if(!$conn){
        echo 'Connection error' .mysqli_connect_error();
     }


if (isset($_SESSION['loginUser']))
{

      $user =  $_SESSION['loginUser'];
      $sql ="SELECT `MovieID` FROM `API_movieDB` WHERE `subscirber` = '$user'";


      $result = mysqli_query($conn,$sql);

      $api_key = "67419e1d10dc2cb366bee574535e9af3";


     while( $movieID = mysqli_fetch_assoc($result))
     {
         $movies =  implode("",$movieID);
         
        $url = "https://api.themoviedb.org/3/movie/$movies?api_key=$api_key";
        $myobj = json_decode(geturl($url));

        $img = $myobj->poster_path;
        $imgurl = "https://image.tmdb.org/t/p/w500".$img;
        //echo  $imgurl;
        echo "<div>";
        echo "<p>".$myobj->title."</p>";
        echo "<p>";
       // echo  '<a href=" https://huax.ursse.org/unsubscribe.php?movieID='.$movies.'">Unubscribe   </a>';
        echo "</p>";
	echo "<p>";
        echo  '<a href=" https://huax.ursse.org/movieDetail.php?movieID='.$movies.'">Movie Detail</a>';
        echo "</p>";

        echo '<img src = "'.$imgurl.'" width = "200"  height = "200">';
        echo "</div>";

     }



}






?>



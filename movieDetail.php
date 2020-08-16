<?session_start();
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


if (isset($_GET['movieID']))
{
  $movies = $_GET['movieID'];
}

        $api_key = "67419e1d10dc2cb366bee574535e9af3";    

        $url = "https://api.themoviedb.org/3/movie/$movies?api_key=$api_key";
        $myobj = json_decode(geturl($url));

        $img = $myobj->poster_path;
        $imgurl = "https://image.tmdb.org/t/p/w500".$img;

        
        $videourl = "https://api.themoviedb.org/3/movie/$movies?api_key=$api_key&append_to_response=videos";
        $myobj2 = json_decode(geturl($videourl));

        $key = $myobj2->videos->results[0]->key;
	$youtubeUrl = "https://www.youtube.com/embed/$key";
  

        echo "<div>";
	 echo "<p>";
        echo  '<a href="https://huax.ursse.org/mySubscription.php">Back to My subscription </a>';
        echo "</p>";

        echo "<p>".$myobj->title."</p>";
        echo "<p>";
        echo  '<a href=" https://huax.ursse.org/unsubscribe.php?movieID='.$movies.'">Unubscribe </a>';
        echo "</p>";
        echo '<img src = "'.$imgurl.'" width = "300"  height = "300">';



        echo "<p>";
        echo "Overview:";
        echo "</p>";
	echo "<p>".$myobj->overview."</p>";


       echo "<p>";
       echo "Genres:";
       echo "</p>";
       echo "<p>"; echo $myobj->genres[0]->name."  & "; echo $myobj->genres[1]->name." & "; echo $myobj->genres[2]->name."  ";
       echo "</p>";


        echo "<p>";
        echo "Popularity:";
        echo "</p>";
        echo "<p>".$myobj->popularity."</p>";




        echo "<p>";
        echo "Budget:";
        echo "</p>";
        echo "<p>".$myobj->budget."</p>";

      
      
        echo "<p>";
        echo "Revenue:";
        echo "</p>";
        echo "<p>".$myobj->revenue."</p>";


        echo "<p>";
        echo "Release Date:";
        echo "</p>";
        echo "<p>".$myobj->release_date."</p>";


     
       
       echo "<p>";
       echo "Run Time:";
       echo "</p>";
       echo "<p>".$myobj->runtime."</p>";

       echo "<p>";
       echo "Status:";
       echo "</p>";
       echo "<p>".$myobj->status."</p>";

        echo "<p>";
       echo "Tagline:";
       echo "</p>";
       echo "<p>".$myobj->tagline."</p>";
       
       echo "<p>";
       echo "Original_language:";
       echo "</p>";
       echo "<p>".$myobj->original_language."</p>";

       echo "<p>";
       echo "Production Companies:";
       echo "</p>";
       echo "<p>"; echo $myobj->production_companies[0]->name."   &"; echo $myobj->production_companies[1]->name."   &"; echo $myobj->production_companies[2]->name."  ";
       echo "</p>";
    

        echo "<p>";
	echo "Movie Trailer";
        echo "</p>";
	
	echo "<p>";
        echo '<embed type="video/webm" src="'.$youtubeUrl.'" width="960" height="540"  frameborder="0" allowfullscreen>';
        echo "</p>";
        echo "</div>";

?>
<?php
  session_start();
?>
<html>
<head>
       <title> Movie Posters and Login</title>
       <body>
	 <div class ="container">
	 <h2> Login Here</h2>
	 <form action = "validation.php" method = "post">
	   <label>User Name</lable>
           <input type ="text" name= "user">
           <label>Password</lable>
           <input type ="password" name= "password">
           <button type ="submit" >Login</button>
         </form>
         
 
          <h2>Register Here</h2>
           <form action = "registration.php" method = "post">
           <label>User Name</lable>
           <input type ="text" name = "user">
           <label>Password</lable>
           <input type ="password" name = "password">
           <label>Email Address</lable>
           <input type ="text" name = "email">
	   <button type ="submit" >Register</button>
           </form>
  
	 </div>
	 </body>
</html>
<?php
      $conn = mysqli_connect('localhost','root','1598753','mydatabase');

     if(!$conn){
        echo 'Connection error' .mysqli_connect_error();
     }
      $sql ='SELECT * FROM `MovieDB` WHERE 1';

      $result = mysqli_query($conn,$sql);
     /* $movieinfo = mysqli_fetch_array ($result,MYSQLI_ASSOC);*/

        while ($movieinfo = mysqli_fetch_array($result)){
        echo "<div>";
        echo "<p>".$movieinfo['Name']."</p>";
/*echo  "<img src='".base64_encode($movieinfo['Poster'])."' >";echo "<td>"; ?><img src ="<?php echo @movieinfo["images"]; ?>"> <?php echo "</td>";*/
        echo '<img src = "data:image/jpeg; base64,'.base64_encode($movieinfo['Poster']).'" width = "200" height = "200" />';
        echo "</div>";



     }
        mysqli_free_result($result);
        mysqli_close($conn);
?>

    

<html>
<head>
<style>
table, th, td{
  border: 1px solid black;
  border-collapse: collapse;
}
caption{
border:1px solid black;
border-collapse: collapse;

}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
</head>
<body>
<?php
      $conn = mysqli_connect('localhost','root','1598753','mydatabase');

      if(!$conn){
         echo 'Connection error' .mysqli_connect_error(); 
     }
      $sql ='SELECT * FROM `Employees` WHERE 1';

      $result = mysqli_query($conn,$sql);
      $employees = mysqli_fetch_all ($result,MYSQLI_ASSOC);
//      print_r($employees);
  
     
        echo "<table>";
	echo "<caption>";echo 'Employees';echo "</caption>";
        echo "<tr>";
	echo "<th>"; echo 'First Name'; echo "</th>";
	echo "<th>"; echo 'Last Name'; echo "</th>";
	echo "<th>"; echo 'Position'; echo "</th>";
        echo "</tr>";
	
        $counter =  0;
	while ($counter<6)
	{
         echo "<tr>";
         echo "<td>"; echo $employees[$counter]['FirstName']; echo "</td>";
	 echo "<td>"; echo $employees[$counter]['LastName']; echo "</td>";
         echo "<td>"; echo $employees[$counter]['Position']; echo "</td>";
	 echo "</tr>";

         $counter++;
        }

	echo "</table>";

?>

</body>
</html>

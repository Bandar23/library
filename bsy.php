<?php include("design.php"); ?>
<?php
$servername="localhost";
$username="root";
$password="";
$db="library";

$conn = mysqli_connect($servername,$username,$password,$db);
if(!$conn){
  die("Connection failed: " .mysqli_connect_error());
}
 // echo"Connected successfully";

 $sql = "SELECT id,bk_name,pic,r_name FROM books ";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
       echo"<tr>";
       echo "<td> " ."<center>"."<img src=\"". $row["pic"]."\"width=\"200px\" height=\"200px\">"."</td></center>"."<br>"."<td>"."<center>". $row["bk_name"]."</td></center><br><td>"."<center>".$row["r_name"]."</td>"."</center>";
       echo "<br>";
       echo "</tr>";
     }
 } else {
     echo "0 results";
 }
 mysqli_close($conn);


?>


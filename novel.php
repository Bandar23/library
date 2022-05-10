<?php

include 'disingBo.php';


$servername="localhost";
$username="root";
$password="";
$db="library";

$conn = mysqli_connect($servername,$username,$password,$db);
if(!$conn){
  die("Connection failed: " .mysqli_connect_error());
}
  //echo"Connected successfully";
  
$sql = "SELECT id,bk_name,pic,r_name FROM books WHERE sort = 'a novel' ";
$result = $conn->query($sql);

?>

<!doctype html>
<html>
  <head>
    <title> Nove</title>
  <link href="frontStyle.css" rel="stylesheet">
  </head>
  <body>

<?php
 
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      echo "<div class='gallery'>";
      echo "<center>";
      echo "<img src='images/". $row['pic']."'\"width=\"200px\" height=\"300px\">";
      echo "<div class='desc'>". $row['bk_name']."</div>";?>
      <a id="a" href="info.php?sow=<?php  echo $row['id']; ?> "> <span class='text-muted'> View </span></a>  <?php
      echo "</center>";
      echo "</div>";
      }
} else {
     echo "0 results";
 }
mysqli_close($conn);

?>
<br>
<br>

</div>

</body>
</html>

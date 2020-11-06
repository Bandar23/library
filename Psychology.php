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
$sql = "SELECT  id,bk_name,pic,r_name FROM books WHERE sort = 'psychology' ";
$result = $conn->query($sql);

?>

<!doctype html>
<html>
  <head>
  <style>

    
#B{
background-image: url('images/boo.jpg');
border-bottom: 6px solid gray;
 background-color:gray;
 margin: 10px;
 padding: 10px;
           
height: 600px;
border-left: 6px solid rgba(0, 0, 63, 0.417);
border-right: 6px solid rgba(0, 0, 63, 0.417);


}
#a{
  color:grey;
}
   
    

 div.gallery {
background-color:white;
 margin: 20px;
 border: 6px solid #ccc;
 float: left;
 width: 250px;
height: 400px;
}

div.gallery:hover {
  border: 6px solid #777;
}

div.gallery img {

  width: 240px;
  height: 300px;
}
</style>
  </head>
  <body>

<?php

 
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      echo "<div class='gallery'>";
      echo "<center>";
      echo "<img src='images/". $row['pic']."'\"width=\"200px\" height=\"300px\">";
      echo "<div class='desc'>". $row['bk_name']."</div>";?>
      <a id="a" href="info.php?sow=<?php echo $row['id']; ?> "><span class='text-muted'>View </span></a>  <?php
      echo "</center>";
      echo "</div>";
      }
} else {
     echo "0 results";
 }


?>
<br>
<br>

</div>

</body>
</html>

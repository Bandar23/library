<?php 


$servername = "localhost";
$username = "root";
$password = "";
$dbname ="library";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn) {
    die("Connection failed: " . mysqil_connect_error());
}
//echo "Connected successfully";

$se = $_GET['search'];


if(!empty($se)){
    
$sql ="SELECT * FROM books WHERE bk_name LIKE '%$se%'";
$result = $conn->query($sql);

   while($row = $result->fetch_assoc()) {

    echo $row['r_name']."<br/>"."<br />"; 
     echo "<img src='images/". $row['pic']."'\"width=\"100px\" height=\"100px\">"; ?> <br /><br />
    <a id="a" href="info.php?sow=<?php  echo $row['id']; ?> "><span> View </span></a></h5> <br /><br /> <?php 
      
   }
}else{
       echo "0 result";
   }

?>

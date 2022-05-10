 <?php 

include 'disingBo.php';

 
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="library";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn) {
    die("Connection failed: " . mysqil_connect_error());
}
//echo "Connected successfully";


$sql ="SELECT * FROM articles";
$result = $conn->query($sql);



?>

        
<!doctype html>
<html lang="en">
  <head>
    <title> Articles</title>
  <link href="frontStyle.css" rel="stylesheet">

  </head>
  <body>
  <h2 id="sa"> Articles</h2>
    <?php 
    if($result->num_rows > 0){
      while($rows = $result->fetch_assoc()){ ?>
       <div class="Fat">
          <div class="img">
          <?php echo "<img src='images/".$rows['pic_ma']."'\"width=\"200px\" height=\"200px\">"; ?>
          </div>
          </a>
          <div class="Hedaing">
            <?php echo "<h3>".$rows['name_m']."</h3>"; ?>
            <a class="hr" href="viewA.php?show=<?php echo $rows['p_no'];  ?>"><button class="but">Read</button></a>
        </div>
       </div>
    </div>
    <?php }
    }else {
      echo "Nothing ! ";
    }

    ?>


</body>
</html>

 
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


if(isset($_GET['sow'])){
  $sql = "SELECT * FROM books WHERE id = ?";
if($stmt = mysqli_prepare($conn,$sql)){

    mysqli_stmt_bind_param($stmt,"i",$param_id);

    $param_id = trim($_GET['sow']);

    if(mysqli_stmt_execute($stmt)){
      $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) == 1) {
        $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $name = $rows['bk_name'];
      $pic = $rows['pic'];
      $write_name = $rows['r_name'];
      $brief = $rows['brief'];
      $sort = $rows['sort'];



    }
    else{
      herder("loction:bo.php");
      exit();
    }
  }else{
      echo " Oops ! Somthing Went Wrong. Try Agian";
    }
    mysqli_stmt_close($stmt);
  }
}else{
  echo " Wrong ! !";
}




?>



<!doctype html>
<html>
  <head>
  <title> <?php  echo $name ; ?> </title>
  <style>
#bo{
  border:  3px solid #777;
  }


img {
    border:  3px solid #777;
    }
    h3{
  width:120px;
  color: grey;
}

    h1{
  width:240px;
  color: grey;
}

h2{
  width:180px;
  color: grey;
}
    

</style>
</head>
<body>
<br>

<div id="bo">
<?php 

   echo "<h1>".$name."</h1>"."<br>";
   echo "<img src='images/".$pic."'\"width=\"200px\" height=\"300px\">"."<br>"."<br>";
   echo $brief."<br>"."<br>";
   echo "<h2>".'The Author'."</h2>".$write_name."<br>";
   echo "<h3>".'The Sort'."</h3>".$sort;


  ?>
</div>

</body>
</html>


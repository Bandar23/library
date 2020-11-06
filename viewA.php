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

if(isset($_GET['show'])){
  $sql ="SELECT * FROM articles WHERE p_no= ? ";

  if($stmt = mysqli_prepare($conn, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $param_id);
    
    // Set parameters
    $param_id = trim($_GET["show"]);
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1){
            /* Fetch result row as an associative array. Since the result set
            contains only one row, we don't need to use while loop */
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            // Retrieve individual field value
            $name = $row["name_m"];
            $content = $row["content"];
            $author = $row["author"];
            $t_ype = $row["t_ype"];

        } else{
            // URL doesn't contain valid id parameter. Redirect to error page
            header("location: error.php");
            exit();
        }
        
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}
 
// Close statement
mysqli_stmt_close($stmt);
} else{
// URL doesn't contain id parameter. Redirect to error page
header("location: error.php");
exit();
}



 ?>

 
<!Doctype html>
<html>
<head>
<style>
  img {
    border:  3px solid #777;
    }
    h3{
  width:120px;
  border:  3px solid #777;
  color: black;
}

    h1{
  width:240px;
  border:  3px solid #777;
  color: black;
}
#bo{
  border:  3px solid #777;
  }
  span{
  color: red;
  }
</style>
</head>
<body>
<br/>
<center>
<div id="bo">
    <h1><?php  echo $name; ?></h1>
    <p><?php  echo $content; ?></p>
    <h3><?php  echo $author;  ?> </h3>
    <span color='red'><?php  echo $t_ype;  ?> </span>

  </div>
</center>
</body>
</html>

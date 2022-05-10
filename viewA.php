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
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            // Retrieve individual field value
            $Id_Article   = $row['p_no'];
            $name         = $row["name_m"];
            $content      = $row["content"];
            $author       = $row["author"];
            $t_ype        = $row["t_ype"];
            $intro        = $row['intro'];
            $pic          = $row['pic_ma'];

        }else{
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


$Show_All = "SELECT * FROM articles Where t_ype = '".$t_ype."' AND p_no != '".$Id_Article."' ";

$All_Result = mysqli_query($conn,$Show_All);

if(!$All_Result){

  echo "Something Wrong Whit The Query ! ";
}



 ?>

 
<!Doctype html>
<html>
<head>
<link href="frontStyle.css" rel="stylesheet">
<title> <?php echo $name; ?> </title>
<link href="/book/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>
<body>
<br/>

<div class="card mb-3">
  <?php echo "<img src='images/".$pic."'\"width=\"200px\" height=\"350px\" class='card-img-top'>"; ?><br /><br />
  <div class="card-body">
    <h5 class="card-title" id="s"><?php  echo $name; ?></h5>
    <p class="card-text" id="c"><?php  echo $intro;?>.</p>
  </div>
</div>

<br/><br />
<p  id="f"><?php  echo $content; ?></p><br /><br />
<div class="card">
  <div class="card-header">
  Writer
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <h5 class=""><?php  echo $author; ?> </h5>
      <footer class="blockquote-footer">This Article Is: <cite title="Source Title"><?php  echo  $t_ype; ?></cite></footer>
    </blockquote>

   
    <div class="similar">
      
<?php while($row = mysqli_fetch_array($All_Result)){ ?>
   <div class="Fat">
          <div class="img">
          <?php echo "<img src='images/".$row['pic_ma']."'\"width=\"150px\" height=\"200px\">"; ?>
          </div>
          <div class="Hedaing">
            <?php echo "<h3>".$row['name_m']."</h3>"; ?><br>
            <a class="hr"  href="viewA.php?show=<?php echo $row['p_no'];  ?>"><button class="but"> Click </button></a>
        </div>
       </div>
    </div>
    <?php  } ?>

</div>
  </div>

</div>
</body>
</html>

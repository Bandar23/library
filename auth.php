<?php 

include 'disingBo.php';
require_once 'config.php';

if(isset($_GET['aut'])){
    $sql = "SELECT * FROM cv WHERE cv_id = ?";
  if($stmt = mysqli_prepare($link,$sql)){

      mysqli_stmt_bind_param($stmt,"i",$param_id);

      $param_id = trim($_GET['aut']);

      if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

      if(mysqli_num_rows($result) == 1) {
          $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);
            
          $name = $rows['p_name'];
          $pic = $rows['p_pic'];
          $cv = $rows['cv_content'];
      }
      else{
          header("location: author2.php");
          exit();
      }
  }
  else{
      echo " Oops ! Something Went Wrong. Try Agian";
  }
  mysqli_stmt_close($stmt);
}
}else{
    echo " Wrong ! !";
}


?>

<!DOCTYPE html>
    <html>
        <head>
        <title> <?php echo $name; ?> </title>

           <style>
               img {
                  border-radius: 50%;
                  border:  3px solid #777;
               }
               #bo{
                border:  3px solid #777;
               }
           </style>
        </head>
        <body>
        <br />
        <section>
        <div id="bo">
       <h1> <?php echo $name; ?> </h1>
       <?php   echo "<img src='images/".$pic."'\"width=\"200px\" height=\"300px\">"; ?>
       <p> <?php echo $cv; ?> </p><br><br>
       </div>
       <section>



        </body>
    </html>

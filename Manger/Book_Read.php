<?php 

session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location: login.php");
    exit;
}



if(isset($_GET['read']) && !empty(trim($_GET['read']))){

    require_once 'config.php';

        $sql = "SELECT * FROM books WHERE id = ?";
      if($stmt = mysqli_prepare($link,$sql)){
      
          mysqli_stmt_bind_param($stmt,"i",$param_id);
      
          $param_id = trim($_GET['read']);
      
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
            herder("loction:index_Books.php");
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
        <link rel="stylesheet" href="AllStyle.css" type="text/css">
        <title> <?php  echo $name ; ?> </title>
        <style>
      #bo{
        border:  3px solid #777;
        display:block;
        }
      
      
      img {
          border:  3px solid #777;
          }
          h3{
        width:120px;
        background-color: grey;
        color: white;
      }
      
          h1{
        width:240px;
        background-color: grey;
        color: white;
      }
      
      h2{
        width:180px;
        background-color: grey;
        color: white;
      }
         p{
             color:black;
         } 
      
      </style>
      </head>
      <body>
      <br>
      
      <div id="bo">
      <a href="index_books.php"><button class="but-back" type="button">< Back</button></a>

      <center>
      <?php 
      
         echo "<h1>".$name."</h1>"."<br>";
         echo "<img src='../images/".$pic."'\"width=\"200px\" height=\"300px\">"."<br>"."<br>";
         echo "<p>".$brief."</p>"."<br>"."<br>";
         echo "<h2>".'The Author'."</h2>".$write_name."<br>";
         echo "<h3>".'The Sort'."</h3>".$sort;
      
      
        ?>
        </center>
      </div>
      
      </body>
      </html>
      
      
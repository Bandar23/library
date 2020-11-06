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

$name = $art = $typ = $writer = "";
$e_name = $e_art = $e_typ = $e_writer = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $input_name = trim($_POST['name']);
  if(empty($input_name)){
    $e_name = " Enter The Article Name ";
  }
  else{
    $name = $input_name;
  }

  $input_art = trim($_POST['cont']);
  if(empty($input_art)){
    $e_art = "Enter The Content The Article ";
  }
  else{
    $art = $input_art;
  }

  $input_writer = trim($_POST['writer']);
  if(empty($input_writer)){
    $e_writer = "Enter The Writer Name ";
  }
  else{
    $writer = $input_writer;
  }

  $input_typ = trim($_POST['dep']);
  if(empty($input_typ)){
    $e_typ = "Enter The Article Type ";
  }
  else{
    $typ = $input_typ;
  }

  if(empty($e_name) && empty($e_art) && empty($e_writer) && empty($e_typ)){
    $sql = "INSERT INTO articles (name_m , content , author , t_ype) VALUES ( ?, ?, ?, ? ) ";

  if($stmt = mysqli_prepare($conn , $sql)){
    mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_art, $param_Writer, $param_typ);
      $param_name = $name ; 
      $param_art = $art ; 
      $param_Writer = $writer;
      $param_typ = $typ ; 

    if(mysqli_stmt_execute($stmt)){
      header("location: Art.php");
      exit();
    }else{
      echo "Something went wrong. Please try again later.";
    }
  }
  mysqli_stmt_close($stmt);
  }
  mysqli_close($conn);
}



?>

<!DOCTYPE html>
   <html>
      <boyd>
         <style>
.error {color: #FF0000;}

body, html {
  height: 900px;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.error {color: #FF0000;}


.bg-img {
  /* The image used */
  background-color: white;
  border: 3px solid grey;

  min-height: 200px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat:repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: center;
  margin:5px;
  max-width: 900px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text]{
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border:  3px solid grey;
  background: #f1f1f1;
}

input[type=text]:focus{
  background-color: #ddd;
  outline: none;
  border:  3px solid grey;
}

/* Set a style for the submit button */
.btn {
  background-color:grey;
  color: white;
  padding: 16px 20px;
  border:  3px solid grey;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
textarea{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border:  3px solid grey;
  background: #f1f1f1;
  background-color: #ddd;
  outline: none;
  

}
h1{
  width:300px;
  background-color:grey;
  border:  3px solid grey;
  color: black;
}
           </style>

        
            <center>
            <h1> إضافة مقالة جديدة </h1>
          
          <div class="bg-img">
          <form method="POST" action="Art.php" class="container">
             <label> عنوان المقالة </label><br>
               <input type="text" name="name"  value="">
               <span class="error">* <?php echo $e_name; ?></span><br>
               <div name="art">
               <textarea name="cont" rows="100" cols="100"></textarea>
               <span class="error">* <?php echo $e_art; ?></span><br>
                
               <label> الكاتب </label><br>
               <input type="text" name="writer" value="">
               <span class="error">* <?php echo $e_writer; ?></span><br>
               <label> تصنيف المقالة </label><br>
               <input type="radio" name="dep" value="psychology" >علم نفس<br>
               <input type="radio" name="dep" value="scientific" >علمي<br>
               <input type="radio" name="dep" value="literature" >أدب<br>
               <input type="radio" name="dep" value="Fiction" >خيال<br>
               <span class="error">* <?php echo $e_typ; ?></span><br>
              
               <button type="submit" name="insert" class="btn" value="Insert"> Insert </button>
          </form>
      </div>
        </center>
    </body>
 </html>
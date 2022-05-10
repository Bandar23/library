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

$name = $cv ="";
$name_err = $cv_rr ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_name = trim($_POST['w_name']);
    if(empty($input_name)){
      $name_err = "Please Enter The Name .";
    }else{
      $name = $input_name;
    }
    $input_cv = trim(mysqli_real_escape_string($conn,$_POST['cv_con']));
     if(empty($input_cv)){
       $cv_rr = "Please Enter The Content.";
     }else{
       $cv = $input_cv;
     }
    
    
    $errors = array();
    $file_name = $_FILES['pic']['name'];
    $file_size = $_FILES['pic']['size'];
    $file_tmp  = $_FILES['pic']['tmp_name'];
    $file_type = $_FILES['pic']['type'];
    $result =explode('.',$_FILES['pic']['name']);
    $file_ext=strtolower(end($result));

    $extensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)===false){

        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152){
        $errors[] = 'File size must be excately 2 MB';
    }

    if(empty($errors)==true){
             
        move_uploaded_file($file_tmp,"images/".$file_name);
        //echo "Success";
     }else{
        print_r($errors);
     }

    $query =  mysqli_query($conn,"INSERT INTO cv(p_name,p_pic,cv_conte) VALUES ('$name','$file_name','$cv')");
    mysqli_query($conn,$query);
   
    if(!$query){
      echo "Error: " . mysqli_error($conn);
      }
    }



      


?>


<!DOCTYPE html>
<head>
<script src="https://cdn.tiny.cloud/1/sm78zfcsxu9o3edisjj0dd3e67qtnli0lo1ak9tk05hffl7x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script> 
           tinymce.init({
           selector: 'textarea'
           
         });
</script>
<style>
textarea{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border:  3px solid grey;
  background: #f1f1f1;
  background-color: #ddd;
  outline: none;
  

}
body, html {
  height: 900px;
  font-family: Arial, Helvetica, sans-serif;
}
  #err{
    color:red;
  }
body {
  background-color:white;
}
#header{

padding:50px;
border: solid;
background-image: url('book-background.jpg');
border: 5px solid black;
background-color: lightblue;
padding-top: 50px;
padding-right: 30px;
padding-bottom: 50px;
padding-left: 80px;

}

#header h1{
padding:50px;
font-family:"OCR A";
display:inline-block;
text-align:left;
}
#lin{
    text-align:center;
    background-color:black;
    color:black;
    text-color: white;

}
a:link, a:visited {
  color: black;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;

width: 10%;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
cursor: pointer;}

}

a:hover, a:active {
  background-color: black;

}
#footer{
    text-align:center;
    background-color:grey;
    color:white;
}

#borderS{
    border: solid;

}
.dropbtn {
  background-color: white;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  text-align:center;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: white}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
}
.mySlides {display:none;}

input[type=text]{
  width: 60%;
  padding: 12px 20px;
  margin: 8px 0;
  display:block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=submit] {
  width: 50%;
  background-color: grey;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  width:80%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

</style>
</head>
<body>
<center>
<div id = "header">
<img src="li.png" alt="Me" width="200" height="200">
</div>
</center>

<center>
<ul>

<a href="wa.php"> Home </a>   |     <a href="bo.php"> Books </a>  |    <a href="rt.php"> The Authors </a>   |   


<div class="dropdown">
  <button class="dropbtn">Sections</button>
  <div class="dropdown-content">
  <a href="literature.php">literature</a>
  <a href="psychology.php">Psychology</a>
  <a href="Novel.php"> a Novel</a>
  <a href="Articles.php"> Articles</a>
 
  </div>
</div>



<h3>New Author</h3>

  <form  method="POST" action="author1.php" enctype="multipart/form-data">
    <label>First Name</label>
    <input type="text" name="w_name" >
    <span id="err">* <?php echo $name_err; ?> </span><br>
    <label > Cv </label><br>
      <textarea type="text" name="cv_con" rows="80" cols="80" ></textarea><br>
      <span id="err">* <?php echo $cv_rr; ?> </span><br>

      <label> Pic The Author </label>
     <input type="file" name="pic"><br>
    <input type="submit" value="submit">
  </form>
</center>
</body>
</html>
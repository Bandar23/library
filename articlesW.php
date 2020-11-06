<?php
$servername="localhost";
$username="root";
$password="";
$db="library";

$conn = mysqli_connect($servername,$username,$password,$db);
if(!$conn){
  die("Connection failed: " .mysqli_connect_error());
}
  //echo"Connected successfully";
?>

<!Doctype html>
<html>
<body>
<style>
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
  background-color: grey;
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
input[type=text]{
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[id=con]{
  width: 20%;
  height:20%;

}

</style>
<body>
<center>
<div id = "header">
<img src="li.png" alt="Me" width="200" height="200">
</div>
</center>

<center>
<ul>
<a href="wa.php"> Home </a>   |     <a href="bo.php"> Books </a>  |    <a href="rt.php"> The Authors </a>   |      <a href="insert.php"> Insert </a>

<li class="nav-item dropdown">
        <h1>  The Sections</h1>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="literature.php">literature</a>
          <a class="dropdown-item" href="psychology.php">Psychology</a>
          <a class="dropdown-item" href="Novel.php"> a Novel</a>
          <a class="dropdown-item" href="Articles.php"> Articles </a>
          <a class="dropdown-item" href="Articles.php"> Articles </a>

        </div>
      </li>
    </ul>
</div>
</center>
<br>
<br>
<br>


<center>
<h1> إضافة مقالة جديدة  </h1>

<div>
<form method="POST" action="pegepy.php">
<label>  عنوان المقالة </label><br>
<input  id= "con" type="text" name="name" value=""   placeholder="  اسم المقالة  "> <br><br>
<label> المحتوى </label><br><br>
<textarea  id= "con" name="content" class="form-control"></textarea><br><br>
<label> كاتب المقالة </label><br><br>
<input   id= "con"type="text" name="author" value="" placeholder="  اسم المحتوى  "><br><br>
<input type="submit" name="Save " value=" Save">
</form>
</div>
</center>


</div>

</body>
</html>

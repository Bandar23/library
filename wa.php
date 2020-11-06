<?php 
 require_once 'config.php';

 $sql = "SELECT * FROM books WHERE sort = 'psychology' AND bk_name like 'Kay Redfield Jamison'" ; 
 $result = $link->query($sql);









?>


<!doctype html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
body {
  background-color:white;
}
a {
      text-decoration:none;

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

#nav{
border: 5px solid rgba(0, 0, 30, 0.150);
background-color: black;
color: white;
padding-top: 3px;
padding-right: 3px;
padding-bottom: 3px;
padding-left: 3px;

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
  color: white;
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
footer{
  text-align: center;
    display:inline-block;
    background-color:grey;
    color:white;
    height:90%;
     width:95%;
}

#borderS{
    border: solid;

}
.dropbtn {
  background-color: black;
  color: white;
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
  background-color: black;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: black}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
}
.mySlides {display:none;}
#red{
  color:red;
}
.w3-content{
  width:300px;

}
#bak{
  background-color:black;
  color:white;
  width:400px;
}

          #sec1{
            border-bottom: 6px solid black;
              margin: 10px;
              height: 400px;
              width:70%;
              text-align: center;
              padding:10px;
              border-bottom-right-radius: 25px;
          }
          #sec2{
            border-bottom: 6px solid black;
              margin: 10px;
              height: 400px;
              width:70%;
              text-align: center;
              padding:10px;
              border-bottom-left-radius: 25px;

              


          }
          #ask{
            border: 3px solid #ccc;
          }
          img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}

.mySlides {display:none;}


</style>
</head>
<title>الرئيسية </title>
<body>
<center>
<div id = "header">
<img src="fgf.jpg" alt="Me" width="200" height="200">
</div>
</center>

<center>
<nav id="nav">
<ul>
<a href="wa.php"> Home </a>   |<a href="bo.php"> Books </a>  |<a href="author2.php">  Authors </a>   |  


<div class="dropdown">
  <button class="dropbtn">Sections</button>
  <div class="dropdown-content">
  <a href="literature.php">literature</a>
  <a href="psychology.php">Psychology</a>
  <a href="Novel.php"> a Novel</a>
  <a href="Articles.php"> Articles</a>
 
  </div>
</div>
</nav>
</center>

<br>
<center>
<section id="sec1">
<h1> &#128214;</h1>
<ul >
<li> It is not a luxury of life and does not bear it, and a person has no right to raise his children without surrounding them with books.</li><br>
<li>We only learn from books that we cannot evaluate. As for the book that we can evaluate, its writer must learn from us.</li><br>
<li> The book is the companion who does not flatter you, the friend who does not tempt you, the companion who does not possess you, and the companion who does not want to extract what you have with spoons and does not treat you with deception, does not deceive you with hypocrisy, and does not deceive you with a lie.</li>


</sectiton>
</center>
<br />


<center>
<section id="sec2">
<span style='font-size:30px;'>&#10068;</span><br />
<pre> Ask us, if you have a question about a book
 that is not available or you want to know something about it, or about an author or an old manuscript.</pre>

<a href="ask.php">
<img  id="ask" src="images/ask.jpg" width="400px" height="200px">
</a>
<br />
<br />
</section>
<br />
<br />
<section id="sec3">
<div class="w3-container">
<span style='font-size:30px;'>&#11088;</span><br />
<h4> The Importent Books In Psychology</h4> 

  <br />
</div>

<?php 
$count = 0;
if($result->num_rows > 0){
  while($rows = $result->fetch_assoc()){ 

echo "<div class='w3-content' style='max-width:800px'>";
echo "<img src='images/". $rows['pic']."'\"width=\"500px\" height=\"300px\" class='mySlides'>"; 
echo "</div>";
$count++; 
echo "</div>"; 


  }
}else{
    echo "0";
  }

?>

<div class="w3-center">
  <div class="w3-section">
    <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>
    <button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>
  </div>
  <?php 

/*
  if($count == 4){
echo "<button class='w3-button demo' onclick='currentDiv(1)'>1</button> 
  <button class='w3-button demo' onclick='currentDiv(2)'>2</button> 
  <button class='w3-button demo' onclick='currentDiv(3)'>3</button>
  <button class='w3-button demo' onclick='currentDiv(4)'>4</button> 
</div>";
  }elseif($count == 5){
  echo "<button class='w3-button demo' onclick='currentDiv(1)'>1</button> 
  <button class='w3-button demo' onclick='currentDiv(2)'>2</button> 
  <button class='w3-button demo' onclick='currentDiv(3)'>3</button>
  <button class='w3-button demo' onclick='currentDiv(4)'>4</button>
  <button class='w3-button demo' onclick='currentDiv(5)'>5</button>  
</div>";
  }else{
    echo " ";
  }
*/
  ?>
  
   
 
</section>
</center>
<br />



<center>
<footer>
<br>
<p> Mida M-B-12-BN </p> 
</footer>
</center>
 
 

    
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-red";
}
</script>

  </body>
</html>
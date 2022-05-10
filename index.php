<?php 
 require_once 'config.php';

 $sql = "SELECT * FROM books WHERE sort = 'psychology' AND r_name like 'Sigismund Schlomo Freud'" ; 
 $result = $link->query($sql);









?>


<!doctype html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
body {
  background-color:white;
}


a {
      text-decoration:none;

    }
#header{

padding:10px;
border: solid;
background-image: url('book-background.jpg');
border: 5px solid white;
background-color: lightblue;
padding-top: 50px;
padding-right: 30px;
padding-bottom: 150px;
padding-left: 80px;

}

#nav{
border: 5px solid white;
background-color: black;
color: white;
}
#nav ul a:hover{
  background-color:grey;
  width:100px

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


footer {
  background-color: black;
  height: 150px;
  padding: 10px;
  text-align: center;
  color: white;
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
            border-bottom:solid 6px rgba(230, 220, 220, 0.679);
              margin: 10px;
              height: 400px;
              width:70%;
              border-radius: 2vw;

              text-align: center;
              padding:10px;
              border-bottom-right-radius: 25px;
          }
          #sec2{
            border-bottom:solid 6px rgba(230, 220, 220, 0.679);
              margin: 10px;
              height: 400px;
              width:70%;
              border-radius: 2vw;
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

#ul{
  text-align:left;
  
}

   
footer{
    background-color: rgba(230, 220, 220, 0.679);
    margin:30px;
    margin-top: 40px;
    margin-left: 40px;
    margin-right:40px ;
    border-radius: 50px;
    width: auto;
    height: 100px;
    text-align:center;
}

footer p{
  padding-top:50px;
}


   .Father{
     display:inline-block;
     margin: 80px;
   }
   
   .textUs{
     height: 50px;
     display:inline-block;
   }

   .textUs ul {
     padding:2px;
   list-style:none;
   line-height:1.6;
   font-size:14px;
   margin: 5px;

   }

   .textUs ul img{
     margin:  5px;
     padding: 3px;

   }
   .textUs ul{
     margin:  5px;
     padding: 3px;

   }
   .Privacy-Policy h3,p{
                        margin:  5px;
                        padding: 3px;
                      }
                      .Privacy-Policy{ 
                        content: "";  
                        display: block; 
                        margin: 0 auto; 
                        width: 60%; 
                        padding-top: 20px; 
                        border-top: 1px solid rgb(131, 127, 127); 
  } 

  .dropdown-content a:hover{
    background-color:grey;
    width:100px

  }

</style>

</head>
<title>Main Page</title>
<body onload="TimeD()">
<center>
<div id = "header">
<img src="fgf.jpg" alt="Me" width="200" height="200">
</div>
<div id="demo"></div>
</center>

<center>
<nav id="nav">
<ul>
<a href="wa.php"> Home </a> <a href="bo.php"> Books </a> <a href="author2.php">  Authors </a>    


<div class="dropdown">
  <button class="dropbtn"><a href="Sections.php">Sections</a></button>
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
<ul class="list-group">
<li class="list-item" id="a"> It is not a luxury of life and does not bear it, and a person has no right to raise his children without surrounding them with books.</li><br>
<li class="list-item">We only learn from books that we cannot evaluate. As for the book that we can evaluate, its writer must learn from us.</li><br>
<li class="list-item active"> The book is the companion who does not flatter you, the friend who does not tempt you, the companion who does not possess you, and the companion who does not want to extract what you have with spoons and does not treat you with deception, does not deceive you with hypocrisy, and does not deceive you with a lie.</li>


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
    echo "Not Yet";
  }

?>

<div class="w3-center">
  <div class="w3-section">
    <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>
    <button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>
  </div>
</section>
</center>
      <footer>
        <p>© 2021 Your Speac. All rights reserved.</p>

      </footer>
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
<script>


function TimeD(){
var DateT = new Date(),
  SimleDa = DateT.toDateString();


document.getElementById("demo").innerHTML = SimleDa;
}
</script>


</body>
</html>
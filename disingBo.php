<!doctype html>
<html>
<head>
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
a {
      text-decoration:none;

    }

#header h1{
padding:50px;
font-family:"OCR A";
display:inline-block;
text-align:left;
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


#footer{
    text-align:center;
    background-color:grey;
    color:white;
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

a:hover{
            border-bottom: 3px solid gray;
            
          }

 #search{
  width:200px;
  height:15px;
  border:1px solid black;
  font-size:15px;
  padding: 5px;
}
#search:focus{
  border:1px grey;
}

</style>
</head>
<body>
<center>
<div id = "header">
<img src="fgf.jpg" alt="Me" width="200" height="200">
</div>
</center>

<center>
<nav id="nav">
<ul>

<a href="wa.php"> Home </a>   |     <a href="bo.php"> Books </a>  |    <a href="author2.php"> Authors </a>   |



<div class="dropdown">
  <button class="dropbtn">Sections</button>
  <div class="dropdown-content">
  <a href="literature.php">literature</a>
  <a href="psychology.php">Psychology</a>
  <a href="Novel.php"> Anovel</a>
  <a href="Articles.php"> Articles</a>
 
  </div> |      
  <input id="search"  placeholder="Search.." />
  </nav>
</div>




<center>
</main>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script><script src="/docs/4.5/assets/js/docs.min.js"></script>
  </body>
</html>
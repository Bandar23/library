 
 
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



$sql = "SELECT id,bk_name,pic,r_name FROM books ";
$result = $conn->query($sql);

$best = "SELECT id,bk_name,pic,r_name FROM books WHERE r_name like '%Sigismund Schlomo Freud%' ";
$viwe = $conn->query($best);

$count ="";




?> 

<!doctype html>
  <head>
  <script src="http://myyazid.com/api/jquery"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
<script>
     $(document).ready(function(){
       $('#search').keyup(function(){
        var input_val =  $('#search').val();
         $.ajax({
             
            url:'search.php?search=' +  input_val,
            beforeSend: function(){
              $('.loding').show();

            },
            success: function(data){
              $('.loding').fadeOut();
              $('#rseult').html(data);
            }
         })
       })
       })
       
</script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</style>
<!-- Custom styles for this template -->
<link href="album.css" rel="stylesheet">
 <style>

    
#B{
background-image: url('images/boo.jpg');
border-bottom: 6px solid gray;
 background-color:gray;
 margin: 10px;
 padding: 10px;
           
height: 600px;
border-left: 6px solid rgba(0, 0, 63, 0.417);
border-right: 6px solid rgba(0, 0, 63, 0.417);


}
    

 div.gallery {
background-color:white;
 margin: 20px;
 border: 6px solid #ccc;
 float: right;
 width: 250px;
height: 400px;
}

div.gallery:hover {
  border: 6px solid #777;
}

div.gallery img {

  width: 240px;
  height: 300px;
}
#a{
  color:grey;
}
#count{
  color:red;
}

#c{
  border: 2px solid #ccc;
}

.topnav {
  overflow: hidden;
  border: 2px solid #ccc;
  margin: 5;
  width: 1000px;
  padding: 3px;
  height: 500px;


}

.topnav a {
  float: left;
  display: block;
  text-align: center;
  padding: 20px 20px;
  text-decoration: none;
  font-size: 17px;

}

.topnav a:hover {
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: black;
  font-size: 20px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: white;
    text-align: left;
    width: 100%;
    margin: 5;
    padding: 14px;
  }
  .topnav input[type=text] {
  }
}


#panel,#flip {
  padding: 5px;
  text-align: center;
  background-color: black;
  border: solid 1px #c3c3c3;
  color: white;

}

#panel {
  display: none;
}
.loding{
  display:none;
}

#sa{
  border:1px solid grey;
}
</style>
  </head>
  <body>
  <section id="sql">
  <br />
  <div id="flip"><> Click Here To See Books Of  The Month <></div>
  <div id="panel" class="topnav">
     <?php  

     if($viwe->num_rows > 0){
       while($rows = $viwe->fetch_assoc()){
            
      echo "<div class='gallery'>";
      echo "<img src='images/". $rows['pic']."'\"width=\"200px\" height=\"300px\">";
      echo "<div class='desc'>". $rows['bk_name']."</div>";?>
      <a id="a" href="info.php?sow=<?php  echo $rows['id']; ?> "><span class='text-muted'> View </span></a>  <?php
      echo "</div>";

       }
     }



     ?>
  <br/>
  </div>
  <br />
  <br />
  <div id="rseult"> </div>
  <p id="sa"><p>

<?php 

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      
     
      echo "<div class='gallery'>";
      echo "<img src='images/". $row['pic']."'\"width=\"200px\" height=\"300px\">";
      echo "<div class='desc'>". $row['bk_name']."</div>";?>
      <a id="a" href="info.php?sow=<?php  echo $row['id']; ?> "><span class='text-muted'> View </span></a>  <?php
      echo "</div>";
      $count++;
      }

}else{
     echo "0 results";
 } 
 
?>
</section>





</body>
</html>




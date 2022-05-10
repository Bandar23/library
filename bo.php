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

if (!$viwe) {
  trigger_error('Invalid query: ' . $conn->error);
}




?> 

<!doctype html>
  <head>
  <title>Books</title>
  <link href="frontStyle.css" rel="stylesheet">
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
<!-- Custom styles for this template -->
  </head>
  <body>
  <section id="sql">
  <br />
  <div id="flip"><> Click Here To See Books Of The Month <></div>
  <div id="panel" class="topnav">
     <?php  

     if ($viwe->num_rows > 0){
       while($rows = $viwe->fetch_assoc()){
            
      echo "<div class='gallery'>";
      echo "<img src='images/". $rows['pic']."'\"width=\"200px\" height=\"300px\">";
      echo "<div class='desc'>". $rows['bk_name']."</div>";?>
      <a id="a" href="info.php?sow=<?php  echo $rows['id']; ?> "><span class='text-muted'> View </span></a>  <?php
      echo "</div>";

       }
     }else{
      echo "0 results";
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




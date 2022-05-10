<?php 

include 'disingBo.php';
require_once 'config.php';


$sql = "SELECT * FROM cv";
$result = $link->query($sql);


?>

<!DOCTYPE html>
   <head> 
   <link href="frontStyle.css" rel="stylesheet">
   <script src="http://myyazid.com/api/jquery"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function(){
       $('#search').keyup(function(){
        var input_val =  $('#search').val();
         $.ajax({
             
            url:'autsea.php?search=' +  input_val,
            beforeSend: function(){
              $('.loding').show();

            },
            success: function(data){
              $('.loding').fadeOut();
              $('#result').html(data);
            }
         })
       })
       })
</script>
   <title> The Authors </title>
   
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
   <br/>
   <img src="images/664.gif" width="50px" height="30px" class="loding"/>
   <br />
   <div id="result"></div>
   <p id="sa"> </p>
   <?php

   if($result->num_rows > 0){
       while($rows = $result->fetch_assoc()){
        echo "<div class='gallery'>";
        echo "<img src='images/". $rows['p_pic']."'\"width=\"200px\" height=\"300px\">"; 
        echo "<div class='desc'>".$rows['p_name']."</div>"; ?>
       <a id="a" href="auth.php?aut=<?php echo $rows['cv_id']; ?> "><span class='text-muted'> View </span></a> <?php
       echo  "</div>";



     }
   }
   ?>
   

   </body>
   </html>
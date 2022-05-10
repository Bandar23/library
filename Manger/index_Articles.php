<?php

session_start();

if(!isset($_SESSION['Admin_Email'])){
  header("location:login.php");
  exit;
}

require_once 'config.php';

$ShowArticles = "SELECT * FROM articles";
$Result_Articles = mysqli_query($link,$ShowArticles);

?>



<!DOCTYPE html>
  <html>
      <head>
      <link rel="stylesheet" href="AllStyle.css" type="text/css">
      </head>
      <title> Articles Management</title>
      <body>

      <?php include('header.php'); ?>
      <center>
  <?php include('Admin_Nav.php'); ?>
        <br>
         <div id="All-Content">

         <a href="Art.php"><button class="button2" type="button">Add A New Article + </button></a>
         <a href="TheFavorite.php"><button class="button2" type="button">The Favirote Articles</button></a> <br/>
         <center>
         <?php if(isset($_SESSION['msg'])): ?>
          <?php
           echo $_SESSION['msg'];
           unset($_SESSION['msg']);
         ?>
        </div>
        <?php endif; ?>
        </center>
        
          <section id="Show-Articles">
          
            <table id="table">
                <tr>
                    <th class="th-table">ON</th>
                    <th class="th-table">The Articlie Name </th>
                    <th class="th-table">Type </th>
                    <th class="th-table">Author</th>
                    <th class="th-table"> Favorite </th>
                    <th class="th-table"> Delete   </th>
                    <th class="th-table"> Edit   </th>
                    <th class="th-table"> Read   </th>


               </tr>
               <?php 

               while($row = mysqli_fetch_array($Result_Articles)){ ?>
               <tr>
                   <td class="td-table"><?php echo $row['p_no']; ?></td>
                   <td class="td-table"><?php echo $row['name_m']; ?></td>
                   <td class="td-table"><?php echo $row['t_ype']; ?></td>
                   <td class="td-table"><?php echo $row['author']; ?></td>
                   <td class="td-table"><a id="imgStar" href="#"><img src="https://img.icons8.com/carbon-copy/16/000000/filled-star.png" width="20px"/></a></td>
                   <td class="td-table"><a id="imgfg" href="Articles_Edit.php?edit=<?php  echo $row['p_no']; ?>"><img src="https://img.icons8.com/metro/52/000000/edit.png" width="15px" /></a></td>
                   <td class="td-table"><a id="imgfg" href="Articles_Delete.php?del=<?php echo $row['p_no']; ?>"><img src="https://img.icons8.com/metro/52/000000/delete-sign.png" width="15px" /></a></td>
                   <td class="td-table"><a id="imgfg" href="Articles_View.php?view=<?php  echo $row['p_no']; ?>"><img src="https://img.icons8.com/metro/52/000000/reading-ebook.png" width="15px" /></a></td>


              </tr>
      <?php } ?>
        

</table>




        
          </section>


         
</div>

      </body>
  </html>

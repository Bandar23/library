<?php

session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location:login.php");
    exit;
  }

  require_once 'config.php';

$sql = "SELECT * FROM books";
$result_Sql = mysqli_query($link,$sql);
  
?>





<!DOCTYPE html>
  <html>
      <head>
          
      <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="AllStyle.css" type="text/css">
      </head>
      <title> Books Management</title>
      <body>

      <?php include('header.php'); ?>
      <center>
  <?php include('Admin_Nav.php'); ?>
        <br>
         <div id="All-Content"><br/><br/><br/>
         <a href="insert.php"><i class="material-icons" style="font-size:50px;color:black">person_add</i></a>
          <section id="choeic">

          <center>
    <?php if(isset($_SESSION['msg'])): ?> 
      <div class="msg">
         <?php
           echo $_SESSION['msg'];
           unset($_SESSION['msg']);
         ?>
        </div>
    <?php  endif  ?> 
  </center>
 
            <table id="table">
                <tr>
                    <th class="th-table">ON</th>
                    <th class="th-table">The Book Name </th>
                    <th class="th-table">Author </th>
                    <th class="th-table">Pic </th>
                    <th class="th-table">Edit </th>
                    <th class="th-table">Delete </th>
                    <th class="th-table">Read</th>
               </tr>
               <?php 
                
               while($row = mysqli_fetch_array($result_Sql)){ ?>
               <tr>
                   <td class="td-table"><?php echo $row['id']; ?></td>
                   <td class="td-table"><?php echo $row['bk_name']; ?></td>
                   <td class="td-table"><?php echo $row['r_name']; ?></td>
                   <td class="td-table"><?php echo "<img src='../images/". $row['pic']."'\"width=\"200px\" height=\"80px\">"; ?></td>
                   <td class="td-table"><a id="imgfg" href="Book_Edit.php?edit=<?php echo $row['id']; ?>"><img src="https://img.icons8.com/metro/52/000000/edit.png" width="15px" /></a></td>
                   <td class="td-table"><a id="imgfg" href="Book_Delete.php?del=<?php echo $row['id']; ?>"><img src="https://img.icons8.com/metro/52/000000/delete-sign.png" width="15px" /></a></td>
                   <td class="td-table"><a id="imgfg" href="Book_Read.php?read=<?php echo $row['id'];   ?>"><img src="https://img.icons8.com/metro/52/000000/reading-ebook.png" width="15px" /></a></td>



              </tr>
      <?php } ?>

</table>




 
         
          </section>


         
</div>

      </body>
  </html>
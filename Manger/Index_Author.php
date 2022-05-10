<?php 


session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location:login.php");
    exit;
  }

  require_once 'config.php';


  $sql = "SELECT * FROM cv";
  $result_Sql = mysqli_query($link,$sql);
  



?>


<!DOCTYPE html>
  <html>
      <head>
          
      <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="AllStyle.css" type="text/css">
      </head>
      <title> Articles Management</title>
      <body>

      <?php include('header.php'); ?>
      <center>
  <?php include('Admin_Nav.php'); ?>
        <br>
         <div id="All-Content"><br/><br/><br/>
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
         <a href="Author_Insert.php"><i class="material-icons" style="font-size:50px;color:black">person_add</i></a>
          <section id="choeic">
 
            <table id="table">
                <tr>
                    <th class="th-table">ON</th>
                    <th class="th-table">The Articlie Name </th>
                    <th class="th-table">Author </th>
                    <th class="th-table">Edit </th>
                    <th class="th-table">Delete </th>
                    <th class="th-table">Read</th>
                    


               </tr>
               <?php 
                
               while($row = mysqli_fetch_array($result_Sql)){ ?>
               <tr>
                   <td class="td-table"><?php echo $row['cv_id']; ?></td>
                   <td class="td-table"><?php echo $row['p_name']; ?></td>
                   <td class="td-table"><?php echo "<img src='../images/". $row['p_pic']."'\"width=\"80px\" height=\"80px\">"; ?></td>
                   <td class="td-table"><a id="imgfg" href="Author_Edit.php?edit=<?php  echo $row['cv_id']; ?>"><img src="https://img.icons8.com/metro/52/000000/edit.png" width="15px" /></a></td>
                   <td class="td-table"><a id="imgfg" href="Author_Delete.php?del=<?php echo $row['cv_id']; ?>"><img src="https://img.icons8.com/metro/52/000000/delete-sign.png" width="15px" /></a></td>
                   <td class="td-table"><a id="imgfg" href="Author_View.php?view=<?php  echo $row['cv_id']; ?>"><img src="https://img.icons8.com/metro/52/000000/reading-ebook.png" width="15px" /></a></td>



              </tr>
      <?php } ?>

</table>




 
         
          </section>


         
</div>

      </body>
  </html>

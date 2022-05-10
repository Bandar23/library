<?php 


session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location:login.php");
    exit;
  }

  require_once 'config.php';
  



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

         <a href="index.php"><button class="button2" type="button"> < Back  </button></a>
        
          <section id="Show-Articles">
          
            <table id="table">
                <tr>
                    <th class="th-table">ON</th>
                    <th class="th-table">The Articlie Name </th>
                    <th class="th-table">Author </th>
                    <th class="th-table">Type</th>
                    <th class="th-table">  Cancel Favorite </th>
                    


               </tr>
               <?php 
                /*
               while($row = mysqli_fetch_array($Result_Articles)){ ?>
               <tr>
                   <td class="td-table"><?php echo $row['p_no']; ?></td>
                   <td class="td-table"><?php echo $row['name_m']; ?></td>
                   <td class="td-table"><?php echo $row['t_ype']; ?></td>
                   <td class="td-table"><?php echo $row['author']; ?></td>
                   <img src="https://img.icons8.com/carbon-copy/16/000000/filled-star.png"/>
                   <td class="td-table"><a id="imgfg" href="#"><img src="https://img.icons8.com/fluent/48/000000/star.png" width="30px"/></a></td>
                   <td class="td-table"><a id="imgfg" href="#"><img src="https://img.icons8.com/fluent/48/000000/delete-sign.png" width="25px" /></a></td>
                   <td class="td-table"><a id="imgfg" href="#"><img src="https://img.icons8.com/office/30/000000/edit-property.png" width="30px" /></a></td>
                   <td class="td-table"><a id="imgfg" href="#"><img src="https://img.icons8.com/carbon-copy/100/000000/book-reading.png" width="70px" /></a></td>


              </tr>
      <?php } ?>
        */ ?>

</table>




        
          </section>


         
</div>

      </body>
  </html>

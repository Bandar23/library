<?php

session_start();

if(!isset($_SESSION['Admin_Email'])){
  header("location:login.php");
  exit;
}

?>

<!DOCTYPE html>
  <html>
      <head>
      <link rel="stylesheet" href="AllStyle.css" type="text/css">
      </head>
      <title> Manag</title>
      <body>

      <?php include('header.php'); ?>
      <center>
  <?php include('Admin_Nav.php'); ?>
        <br>
         <div id="All-Content">
        
          <section id="sec1">
          <div class="Main-Img">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="200" height="200"
viewBox="0 0 100 100"
style=" fill:#fa314a;"><path fill="#60be92" d="M14 48L18 44 25 51 37 39 41 43 25 59z"></path><path fill="#f15b6c" d="M37 67L33 63 26 70 19 63 15 67 22 74 15 81 19 85 26 78 33 85 37 81 30 74z"></path><path fill="#60be92" d="M14 24L18 20 25 27 37 15 41 19 25 35z"></path><path fill="#78a2d2" d="M49 45H86V55H49zM49 69H86V79H49zM49 21H86V31H49z"></path><path fill="#1f212b" d="M85.5 28h-21c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h21c.276 0 .5.224.5.5S85.776 28 85.5 28zM61.5 28h-2c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h2c.276 0 .5.224.5.5S61.776 28 61.5 28zM65.5 73h-1c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h1c.276 0 .5.224.5.5S65.776 73 65.5 73zM57.5 28h-1c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h1c.276 0 .5.224.5.5S57.776 28 57.5 28zM85.5 73h-13c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h13c.276 0 .5.224.5.5S85.776 73 85.5 73zM69.5 73h-2c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h2c.276 0 .5.224.5.5S69.776 73 69.5 73zM86 56H49c-.553 0-1-.447-1-1V45c0-.553.447-1 1-1h37c.553 0 1 .447 1 1v10C87 55.553 86.553 56 86 56zM50 54h35v-8H50V54z"></path><path fill="#1f212b" d="M86 80H49c-.553 0-1-.447-1-1V69c0-.553.447-1 1-1h37c.553 0 1 .447 1 1v10C87 79.553 86.553 80 86 80zM50 78h35v-8H50V78zM86 32H49c-.553 0-1-.447-1-1V21c0-.553.447-1 1-1h37c.553 0 1 .447 1 1v10C87 31.553 86.553 32 86 32zM50 30h35v-8H50V30zM25 36c-.256 0-.512-.098-.707-.293l-11-11c-.391-.391-.391-1.023 0-1.414l4-4c.391-.391 1.023-.391 1.414 0L25 25.586l11.293-11.293c.391-.391 1.023-.391 1.414 0l4 4c.391.391.391 1.023 0 1.414l-16 16C25.512 35.902 25.256 36 25 36zM15.414 24L25 33.586 39.586 19 37 16.414 25.707 27.707c-.391.391-1.023.391-1.414 0L18 21.414 15.414 24zM25 60c-.256 0-.512-.098-.707-.293l-11-11c-.391-.391-.391-1.023 0-1.414l4-4c.391-.391 1.023-.391 1.414 0L25 49.586l11.293-11.293c.391-.391 1.023-.391 1.414 0l4 4c.391.391.391 1.023 0 1.414l-16 16C25.512 59.902 25.256 60 25 60zM15.414 48L25 57.586 39.586 43 37 40.414 25.707 51.707c-.391.391-1.023.391-1.414 0L18 45.414 15.414 48zM33 86c-.256 0-.512-.098-.707-.293L26 79.414l-6.293 6.293c-.391.391-1.023.391-1.414 0l-4-4c-.391-.391-.391-1.023 0-1.414L20.586 74l-6.293-6.293c-.391-.391-.391-1.023 0-1.414l4-4c.391-.391 1.023-.391 1.414 0L26 68.586l6.293-6.293c.391-.391 1.023-.391 1.414 0l4 4c.391.391.391 1.023 0 1.414L31.414 74l6.293 6.293c.391.391.391 1.023 0 1.414l-4 4C33.512 85.902 33.256 86 33 86zM26 77c.256 0 .512.098.707.293L33 83.586 35.586 81l-6.293-6.293c-.391-.391-.391-1.023 0-1.414L35.586 67 33 64.414l-6.293 6.293c-.391.391-1.023.391-1.414 0L19 64.414 16.414 67l6.293 6.293c.391.391.391 1.023 0 1.414L16.414 81 19 83.586l6.293-6.293C25.488 77.098 25.744 77 26 77z"></path></svg>
          <p class="strings"> in This Peages You Can Management The Project, And amendment, addition, and introduction of a new service<p>
          <p class="strings">Here some things are pulled to the site, and the site sections are tracked, added, received and evolved You can also delete, add and edit</p>

          </div>
          </section>

          <section id="sec2">
          <div class="Main-Img">
          <img src="M_Img/icons8-edit-property-64.png" width="350px"  height="400px" />
          <p class="strings"> in This Peages You Can Management The Project, And amendment, addition, and introduction of a new service<p>
          <p class="strings"></p>
          </div>

          </section>

          <section id="sec3">
          <div class="Main-Img">
          <img src="https://img.icons8.com/dusk/64/000000/identification-documents.png"width="150px"  height="150px"/>
          <p class="strings"> in This Peages You Can Management The Project, And amendment, addition, and introduction of a new service<p>
          <p class="strings"></p>
          </div>

          </section>

          <br/><br/><br/><br/>

          <section id="sec4">

          <div class="inline-Img">
           <div class="In-img">
           <img src="https://img.icons8.com/dusk/64/fa314a/add-list.png" width="64px"  /><br><br/>
          <p class="sec4-string"> in This Peages You Can Management The Project, And amendment, addition, and introduction of a new service<p>
          </div>

          <div class="In-img">
          <img src="https://img.icons8.com/dusk/64/fa314a/messaging-.png" width="64px"/><br><br/>
          <p class="sec4-string"> in This Peages You Can Management The Project, And amendment, addition, and introduction of a new service<p>
          </div>

          <div class="In-img">
          <img src="https://img.icons8.com/dusk/64/fa314a/hot-article.png" width="64px"/><br><br/>
          <p class="sec4-string"> in This Peages You Can Management The Project, And amendment, addition, and introduction of a new service<p>
          </div>

          <div class="In-img">
          <img src="https://img.icons8.com/color/48/fa314a/shooting-stars.png" width="60px"/><br><br>
          <p class="sec4-string"> in This Peages You Can Management The Project, And amendment, addition, and introduction of a new service<p>
          </div>
        
          </section>
</div>

      </body>
  </html>

<?php

require_once 'disingBo.php';



?>

<!DOCTYPE html>
   <html>
   <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">

         <style>
 body, html {
  height: 100px;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.error {color: #FF0000;}


.bg-img {
  /* The image used */
  background-image: url("images/boo.jpg");
  border: 3px solid #8B4513;

  min-height: 650px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: center;
  margin:5px;
  max-width: 600px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border:  3px solid #8B4513;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=number]:focus {
  background-color: #ddd;
  outline: none;
  border:  3px solid #8B4513;
}

/* Set a style for the submit button */
.btn {
  background-color: #8B4513;
  color: white;
  padding: 16px 20px;
  border:  3px solid #8B4513;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
textarea{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border:  3px solid #8B4513;
  background: #f1f1f1;
  background-color: #ddd;
  outline: none;
  

}
#file{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border:  3px solid #8B4513;
  background: #f1f1f1;
  background-color: #ddd;
  outline: none;

}
h1{
  width:300px;
  background-color: #8B4513;
  color: white;
}
           </style>
        </head>
      <body>
          <center>
             <h1> Add a new Book  </h1>
            </center>
            <center>
          
            
            <div class="bg-img">
          <form method="POST" action="newinsert.php" enctype="multipart/form-data" class="container">
             <label> The Book Name </label><br>
               <input type="text" name="name" value="" required>
               <span class="error">*</span><br>
               
             <label>The File Book </label><br><br>
             <input type="file" name="pic" id="file">
             <span class="error">*</span><br>

             <label> The Author Name </label><br><br>
               <input type="text" name="author" value="" >
               <span class="error">*</span><br>

               <label> Brife   </label><br><br>
               <textarea name="brief"></textarea><br><br>

               <label> Section </label><br><br>
               <input type="text" name="dep" value="" >
               <span class="error">*</span><br><br>
              
               <button type="submit" name="Save" class="btn"> Send </button> 
          </form>
      </div>
        </center>
    </body>
 </html>

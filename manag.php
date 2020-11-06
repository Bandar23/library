<?php

include 'disingBo.php';

?>

<!DOCTYPE html>
  <html>
      <head>
          <style>
          body{
            
              direction: ltr;
          }
          #a{
            
            border-bottom: 6px solid gray;
            background-color:gray;
            margin: 10px;
            padding: 10px;
           
            height: 600px;
            border-left: 6px solid rgba(0, 0, 63, 0.417);
            border-right: 6px solid rgba(0, 0, 63, 0.417);


          }
          a:hover{
            border-bottom: 3px solid gray;
            
          }
          header{
            border-bottom: 3px solid gray;
            background-color:rgba(173, 7, 7, 0);
            margin: 10px;
            padding: 5px;
            text-align: center;
            opacity: 0.6;
          }
          aside{
            border-left: 6px solid rgba(5, 5, 63, 0.671);
            background-color:rgba(1, 1, 14, 0.376);
            margin:10px;
            height: 450px;
            float: left;
            width:130px;
            text-align: center;

          }
          nav{
          margin:10px;
          text-align: center;
          }
          #sec1{
            border-bottom: 6px solid rgba(0, 0, 63, 0.417);
              margin: 10px;
              height: 150px;
              width:70%;
              text-align: center;
              padding:10px;
              border-bottom-left-radius: 25px;
          }
          #sec2{
            border-bottom: 6px solid rgba(233, 218, 8, 0);

              margin: 10px;
              height: 400px;
              width:85%;
              text-align: center;
              padding:10px;
              border-bottom-left-radius: 25px;


          }
          footer{
            border-right: 6px solid gray;
            background-color:rgba(1, 1, 14, 0.472);
            margin:10px;
            vertical-align: bottom;
            clear: both;
            height: 150px;
            border-right: 6px solid rgba(0, 0, 63, 0.417);
            border-left: 6px solid rgba(0, 0, 63, 0.417);


          }
          nav li{
              display:inline-block;
              padding: 10px;
              text-align: center;

          }
          header li{
            display:inline-block;
            padding: 10px;
            text-decoration:none;

          }
          li a {
              color: cornsilk;
              text-decoration:none;
              border-bottom: 3px solid cornsilk;
              text-align: center;


          }
          h1,p{
            color:white;
            text-align: center;

            

          }
          
          #imgs article {
            display:inline-block;
            text-align: center;
            margin:40px;
            padding: 10px;
            width: 200px;
            border-bottom: 6px solid rgba(0, 0, 63, 0.417);

          }
        #im1,#im2,#im3{
            border-top: 2px solid rgba(0, 0, 63, 0);
            background-color:cornsilk;
            width: 200px;
            padding: 5px;
        }

   .click{
    text-decoration:none;
    padding: 2px 5px;
    width: 78px;
    color:white;
    border-radius:6px;
    background:solid rgba(0, 0, 63, 0.417);
    border:5px solid white; 

}

tr:hover{
    background:#F5F5F5;
}
       
       
       
         
          </style>
      </head>
      <title> Manag</title>
    
      <body>
          <header>
         
               
            </ul>
            </nav>
        </header>
        <br>
         <div id="a">
        
          <section id="sec1">
              <h1> Book Is Life For Me </h1>
              <p>
                  
            
              You think your pain and your heartbreak are unprecedented in the history of the world, but then you read. It was books that taught me that the things that tormented me most were the very things that connected me with all the people who were alive, who had ever been alive</p>

          </section>
          <section id="sec2">

            <div id="imgs"> 
            <center>
            <article>
            <p> Add New Book </p>
            <img id="im1" src="images/booka.jpg" alt="Book" width="200" height="150">
            <a class ="click" href="insert.php"> Click  </a>
            </article>

            <article>
            <p> Add New Author </p>
            <img id="im1" src="images/aur.jpg" alt="Writer" width="200" height="150">
            <a class ="click" href="author1.php"> Click </a>
           </article>

            <article>
            <p> Add New Article </p>
            <img id="im1" src="images/writer.jpg" alt="Writer" width="200" height="150">
            <bottun>
            <a  class ="click"href="Art.php"> Click</a>
            </bottun>
         </article>
         </center>
          </div>
          </section>
          </div>
          <footer>
          <br>
          <br>
                <p> جميع الحقوق محفوظة 2020</p>
          </footer>
      </body>
  </html>

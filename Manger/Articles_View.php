<?php

session_start();


if(!isset($_SESSION['Admin_Email'])){
   header("location: login.php");
   exit;
}






require_once 'config.php';

$name_Article = $content_Article = $Author_Article = $Type_Article = $intro_Article = $pic = $Id_Article = "";

if(isset($_GET['view']) && !empty(trim($_GET['view']))){

    $View_Sql = "SELECT * FROM articles WHERE p_no = ? ";

    if($stmt = mysqli_prepare($link,$View_Sql)){
        mysqli_stmt_bind_param($stmt, "i" , $Param_Id);
      

        $Param_Id = trim($_GET['view']);

        if(mysqli_stmt_execute($stmt)){
           $result =  mysqli_stmt_get_result($stmt);

           if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $Id_Article      = $row['p_no'];
            $name_Article    = $row['name_m'];
            $content_Article = $row['content'];
            $Author_Article  = $row['author'];
            $Type_Article    = $row['t_ype'];
            $intro_Article   = $row['intro'];
            $pic             = $row['pic_ma'] ;

           }else{
               header("location: index.php");
               exit();
           }

        }else{
            echo "Ops! Somthing It's Wrong , Try Agien ! ";
        }
    }

    mysqli_stmt_close($stmt);

}

$Show_All = "SELECT * FROM articles Where t_ype = '".$Type_Article."' AND p_no != '".$Id_Article."' ";

$All_Result = mysqli_query($link,$Show_All);

if(!$All_Result){

  echo "Something Wrong Whit The Query ! ";
}


?>



 
<!Doctype html>
<html>
<head>
<title> <?php echo $name_Article; ?> </title>
<link href="/book/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<style>

.Fat{border: solid white 3px;
         float:left;
         width:380px;
         height:450px;
         margin:15px;}

        .img{border: solid white 3px;
          width: 100%;
          height: auto;

        }
        .Hedaing{border-top: solid black 3px;
                 width:250px;
                 height:50px;
                 margin:10px;
                }

        
       
        a{text-decoration:none;}
        #sa{
          color:#707B7C;
        }
        

  img {
    border:  3px solid #777;
    }
  

  
#bo{
  border:  3px solid #777;
  }
 
  #c{
    color:grey;
  }
  #f{
    font-family:Cursive	;
  }
  #s{
    font-family:Fantasy;
  }
  .button-Left{
      float: left;
      background-color:  rgba(47, 57, 75, 0.303);
      color: white;
  
      width:100px;
      height:50px;
      outline: none;
      cursor: pointer;
  }
.button-Left:hover {
  background-color: white;
  color: black;
}
  
</style>
</head>
<body>
<br/>

<center>

<div class="card mb-3">
<a href="index.php"><button class="button-Left" type="button"> Back </button></a>

  <?php echo "<img src='../images/".$pic."'\"width=\"200px\" height=\"350px\" class='card-img-top'>"; ?><br /><br />
  <div class="card-body">
    <h5 class="card-title" id="s"><?php  echo  $name_Article; ?></h5>
    <p class="card-text" id="c"><?php  echo $intro_Article;?>.</p>
  </div>
</div>

<br/><br />
<p  id="f"><?php  echo $content_Article; ?></p><br /><br />
<div class="card">
  <div class="card-header">
  Writer
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <h5><?php  echo  $Author_Article; ?> </h5>
      <footer class="blockquote-footer">This Article Is: <cite title="Source Title"><?php  echo  $Type_Article; ?></cite></footer>
    </blockquote>
  </div>

  <div id="All">

<?php while($row = mysqli_fetch_array($All_Result)){ ?>
  <a class="hr" href="Articles_View.php?view=<?php  echo $row['p_no']; ?>">
   <div class="Fat">
          <div class="img">
          <?php echo "<img src='../images/".$row['pic_ma']."'\"width=\"200px\" height=\"200px\">"; ?>
          </div>
          </a>
          <div class="Hedaing">
            <?php echo "<h3>".$row['name_m']."</h3>"; ?>
        </div>
       </div>
    </div>
    </a>
    <?php  } ?>

</div>
</div>
</center>
</body>
</html>

<?php 

session_start();

if(!isset($_SESSION['Admin_Email'])){
  header("location:login.php");
  exit;
}

require_once 'config.php';

$name = $art = $typ = $writer = $Intro = $pic = "";
$e_name = $e_art = $e_typ = $e_writer = $e_Intro = $e_pic = "";

if(isset($_POST['insert'])){

  $input_art = trim($_POST['editor']);
  if(empty($input_art)){
    $e_art = "Enter The Content The Article ";
  }
  else{
    $art = $input_art;
  }

  $input_name = trim($_POST['name']);
  if(empty($input_name)){
    $e_name = " Enter The Article Name ";
  }
  else{
    $name = $input_name;
  }

  $input_writer = trim($_POST['writer']);
  if(empty($input_writer)){
    $e_writer = "Enter The Writer Name ";
  }
  else{
    $writer = $input_writer;
  }

  $input_typ = $_POST['dep'];
  if(empty($input_typ)){
    $e_typ = "Enter The Article Type ";
  }
  else{
    $typ = $input_typ;
  }

  $input_intro = trim($_POST['Intro']);
  if(empty($input_intro)){
    $e_Intro = "Pleaes Enter Intro For This Article";
  }else{
    $Intro = $input_intro;
  }

  $input_pic = trim($_POST['pic']);
  if(empty($input_pic)){
    $e_Pic = "Pleeas Enter The Pic For This Article ! ";
  }else{
    $pic = $input_pic;
  }

    if(empty($e_name) && empty($e_art) && empty($e_writer) && empty($e_typ)  && empty($e_Intro) && empty($e_pic)){
    $sql = "INSERT INTO articles (name_m , content , author , t_ype, intro, pic_ma) VALUES ( ?, ?, ?, ?, ?, ? ) ";

  if($stmt = mysqli_prepare($link,$sql)){
    mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_art, $param_Writer, $param_typ,$param_intro,$param_pic);
      $param_name    = $name; 
      $param_art     = $art; 
      $param_Writer  = $writer;
      $param_typ     = $typ; 
      $param_intro   = $Intro;
      $param_pic     = $pic;

    if(mysqli_stmt_execute($stmt)){
      header("location: Art.php");
      exit();
    }else{
      echo "Something went wrong. Please try again later.";
    
        echo "Error: " . mysqli_error($link);
        
    }
  }
  mysqli_stmt_close($stmt);
  
  }
  mysqli_close($link);
}



?>

<!DOCTYPE html>
   <html>
        <head> 
        <link rel="stylesheet" href="../AllStyle.css" type="text/css">
        <script src="https://cdn.tiny.cloud/1/sm78zfcsxu9o3edisjj0dd3e67qtnli0lo1ak9tk05hffl7x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script> 
           tinymce.init({
           selector: 'textarea'
           
         });
</script>

        

</head>
<body>
<?php include('../header.php'); ?>
<?php include('../Admin_Nav.php'); ?> 

<div id="All-Contnent"><br/><br/>
  <center>
<h1>   Add A new Article </h1>
        </center>
          
<div class="bg-img">
<form  id="Form" method="POST" action="Art.php" class="container">
   <div name="art">
        <div id="container">
               <label>   The Content  </label><br>

               <textarea name="editor" id="editor" rows="80" cols="80"  value="Bandar" >
                  </textarea>  
                <span class="error">* <?php echo $e_art; ?></span><br>

               
               <label>  Article title </label><br>
               <input type="text" class="Form-Input"  name="name"  value="">
               <span class="error">* <?php echo $e_name; ?></span><br>

               <label> Intro </label><br>
               <textarea name="Intro" value="" rows="3" cols="10"></textarea>
               <span class="error">* <?php echo $e_Intro; ?></span><br>

               <label> Picture </label><br>
               <input type="text" class="Form-Input" name="pic" value="">
               <span class="error">* <?php echo $e_pic; ?></span><br>

               <label> Author 
               <input type="text" class="Form-Input" name="writer" value="">
               <span class="error">* <?php echo $e_writer; ?></span>
               </label><br>

               <label>  Article classification </label><br/><br/>
               <label class="container"> Psychology  
                 
               <input  class="Radio-but" type="radio" name="dep"  checked="checked" value="Psychology" > 
               <span class="checkmark"></span>
 
               </label>

               <label class="container"> Scientific
               <input  class="Radio-but" type="radio" name="dep" value="Scientific" > 
               <span class="checkmark"></span>

               </label>

               <label class="container"> Literature
               <input  class="Radio-but" type="radio" name="dep" value="Literature" > 
               <span class="checkmark"></span>

               </label>

               <label class="container"> Fiction
               <input class="Radio-but" type="radio" name="dep" value="Fiction" > 
               <span class="checkmark"></span>
               </label>
               <span class="error"><?php echo $e_typ; ?> *</span><br> <br />

              
               <button  id="button" type="submit" name="insert" class="butn" value="Insert" > Insert </button>
               

               
  </div>
       </div>
          </form>

        </div>
   <script>
     function insertDiv(){
  //  var div = document.getElementById("editor1").innerText;


      // return document.getElementById("input").innerHTML = div;
     }
     </script>
       

  </body>
</html>
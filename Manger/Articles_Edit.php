<?php 


session_start();


if(!isset($_SESSION['Admin_Email'])){
    header("location: index.php");
    exit;
}

require_once 'config.php';

$name_Article = $content_Article = $Author_Article = $Type_Article = $intro_Article = $Id_Article = "";

if(isset($_GET['edit']) && !empty(trim($_GET['edit']))){

    $Sql = "SELECT * FROM articles WHERE p_no = ? ";

    if($stmt = mysqli_prepare($link,$Sql)){
        mysqli_stmt_bind_param($stmt, "i" , $Param_Id);
      

        $Param_Id = trim($_GET['edit']);

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


$Id    = $name    = $contnent    = $Author    = $Intro    = $Type = "";
$Id_er = $name_er = $contnent_er = $Author_er = $Intro_er = $Type_er = $Done_er = "";

if(isset($_POST['Edit'])){

    $input_name = trim($_POST['name']);
    if(empty($input_name)){
        $name_er = "Enter The Article Name ! ";
    }elseif(!filter_var(trim($input_name), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_er = "Enter The Correct Article Name ! ";
    }else{
        $name = $input_name;
    }

    $input_content = trim($_POST['content']);
    if(empty($input_content)){
        $contnent_er = "Enter The Article Content ! ";
    }else{
        $contnent = $input_content;
    }

    $input_Author = trim($_POST['author']);
    if(empty($input_Author)){
        $Author_er = "Enter The Author Name ! ";
    }else{
        $Author = $input_Author;
    }
    
    $input_Id  = trim($_POST['id']);
     if(empty($input_Id)){
         $id_er = "The Pr - my It's Empty ! ";
     }else{
        $Id = $input_Id;
     }

    $input_Intro = trim($_POST['intro']);
    if(empty($input_Intro)){
        $Intro_er = "Enter The Article Intro  !";
    }else{
        $Intro = $input_Intro;
    }

    $input_Type = trim($_POST['type']);
    if(empty($input_Type)){
         $Type_er = "Select One Of These Type  ! ";
    }else{
        $Type = $input_Type;
    }

    if(empty($name_er) && empty($contnent_er)  && empty($Author_er) &&  empty($Id_er) && empty($Intro_er) && empty($Type_er)){
     $Update = "UPDATE articles SET name_m = ? , content = ? , author = ? , intro = ? , t_ype = ? WHERE p_no = ? ";
     
     if($stmt = mysqli_prepare($link,$Update)){
         mysqli_stmt_bind_param($stmt , "sssssi" ,$param_Name, $Param_Content, $Param_Author, $Param_Intro, $Param_Type, $Param_Update_Id);

         $param_Name = $name;
         $Param_Content   = $contnent;
         $Param_Author    = $Author;
         $Param_Intro     = $Intro;
         $Param_Type      = $Type;
         $Param_Update_Id = $Id;

         if(mysqli_stmt_execute($stmt)){
   
            $_SESSION['msg'] = "Updated ";
            header("location:index.php");
            exit();
         }else{
            $Done_er = "No Update,There Is Wrong ! ";
            echo "Something's wrong with the query: " . mysqli_error($link);
         }

     }else{
        $Done_er = "No Update,There Is Wrong ! ";
        echo "Something's wrong with the query: " . mysqli_error($link);
     }
     
    }
    mysqli_close($link);

}


?>



<!DOCTYPE html>
   <html>
   <head>
   <script src="https://cdn.tiny.cloud/1/sm78zfcsxu9o3edisjj0dd3e67qtnli0lo1ak9tk05hffl7x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script> 
           tinymce.init({
           selector: 'textarea'
           
         });
</script>
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
  max-width: 900px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=number] {
  width: 50%;
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
  width: 50%;
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
  padding: 15px;
  margin: 5px 0 22px 0;
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
             <h1> Modify Book Data</h1>
             <?php echo $Done_er; ?>
            </center>
            <center>
          
            
            <div class="bg-img">
            <a href="index.php"><button class="but-back" type="button">< Back</button></a>

          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " class="container">
          <div name="art">
           <div id="container">

               <label>   The Content  </label><br>
               <textarea name="content" id="editor" rows="80" cols="80" >
               <?php echo $content_Article; ?>
                  </textarea>  

               
               <label>  Article title </label><br>
               <input type="text" class="Form-Input"  name="name"  value="<?php echo $name_Article; ?>">
               <span> <?php echo $name_er; ?></span>

               <label> Intro </label><br>
               <textarea name="intro" rows="3" cols="10">
               <?php echo $intro_Article; ?>
               </textarea>

    
               <label> Author 
               <input type="text" class="Form-Input" name="author" value="<?php echo $Author_Article; ?>">
               </label><br>

               <input type="hidden" name="id" value="<?php echo $Id_Article; ?>">


               <label>  Article classification </label><br/><br/>
               <label class="container"> Psychology  
                 
               <input  class="Radio-but" type="radio" name="type"  checked="checked" value="Psychology" > 
               <span class="checkmark"></span>
 
               </label>

               <label class="container"> Scientific
               <input  class="Radio-but" type="radio" name="type" value="Scientific" > 
               <span class="checkmark"></span>

               </label>

               <label class="container"> Literature
               <input  class="Radio-but" type="radio" name="type" value="Literature" > 
               <span class="checkmark"></span>

               </label>

               <label class="container"> Fiction
               <input class="Radio-but" type="radio" name="type" value="Fiction" > 
               <span class="checkmark"></span>
               </label>
               <span class="error"></span><br> <br />

              
               <button type="submit" name="Edit" class="btn"> Edit </button> 
               
  </div>
       </div>
          </form>

        </div>
          </form>
      </div>
        </center>
    </body>
 </html>

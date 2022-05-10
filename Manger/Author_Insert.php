<?php

session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location: login.php");
    exit;
}


require_once 'config.php';

$Author_Name  = $file_Name = $Author_Brife = "";
$Author_Name_er  = $Author_Brife_er = "";

if(isset($_POST['Save'])){

    
    $input_name = trim($_POST['A_name']);
    if(empty($input_name)){
        $Author_Name_er = "Enter Author Name ! ";
    }elseif(!filter_var(trim($input_name), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $Author_Name_er = "Enter The Correct Name Pleass !";
    }else{
        $Author_Name = $input_name;
    }

    $errors= array();
    $file_name = $_FILES['A_pic']['name'];
    $file_size = $_FILES['A_pic']['size'];
    $file_tmp = $_FILES['A_pic']['tmp_name'];
    $file_type = $_FILES['A_pic']['type'];
    $temp= explode('.',$file_name);
    $file_te = end($temp);
         
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_te,$extensions) === false){
       $errors[]="extension not allowed, please choose a JPEG or PNG or PNG file.";
    }
    
    if($file_size > 2097152) {
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors) == true) {
       move_uploaded_file($file_tmp,"images/".$file_name);
       //echo "Success";
    }else{
       print_r($errors);
    }

    $input_Brife = trim($_POST['A_brief']);
    if(empty($input_Brife)){
        $Author_Brife_er = "Enter The Content ! ";
    }else{
        $Author_Brife = $input_Brife;
    }

    if(empty($Author_Name_er) && empty($errors) && empty($Author_Brife_er)){
        $Sql = "INSERT INTO cv(p_name,p_pic,cv_conte) VALUES (? , ? , ? )";

        if($stmt = mysqli_prepare($link,$Sql)){
            mysqli_stmt_bind_param($stmt, "sss", $Param_Name, $Param_File, $Param_Brife);

            $Param_Name  = $Author_Name;
            $Param_File  = $file_Name;
            $Param_Brife = $Author_Brife;

            if(mysqli_stmt_execute($stmt)){
                $_SESSION['msg'] = "Inserted ! ";
                header("location: Index_Author.php");
                exit;
            }else{
                echo "SomeThing Wrong ! , Try Later ! ";
            }
        }else{
            echo "SomeThing Wrong !";
        }
        mysqli_stmt_close($stmt);
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
             <h1> Add a new Author  </h1>
            </center>
            <center>
          
            
            <div class="bg-img">
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" class="container">
             <label> The Author Name </label><br>
               <input type="text" name="A_name" value="" required>
               <span class="error">* <?php echo $Author_Name_er; ?> </span><br>
               
             <label>The Author Pic </label><br><br>
             <input type="file" name="A_pic" id="file">
             <span class="error">* </span><br>


               <label> Brife   </label><br><br>
               <textarea name="A_brief" rows="100" cols="100"></textarea><br><br>
               <span class="error">* <?php echo $Author_Brife_er; ?> </span><br>


              
               <button type="submit" name="Save" class="btn"> Save </button> 
          </form>
      </div>
        </center>
    </body>
 </html>





?>
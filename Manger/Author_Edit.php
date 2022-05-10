<?php 


session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location:login.php");
    exit;
  }

  require_once 'config.php';


  $author_id = $author_name = $contnet_cv = "";
if(isset($_GET['edit']) && !empty(trim($_GET['edit']))){


    $Sql = "SELECT * FROM cv WHERE cv_id  = ? ";

    if($stmt = mysqli_prepare($link,$Sql)){
        mysqli_stmt_bind_param($stmt, "i" , $id_param);
        $id_param = trim($_GET['edit']);

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1 ){
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                $author_id    = $row['cv_id'];
                $author_name  = $row['p_name'];
                $contnet_cv   = $row['cv_conte'];
            }else{
                header("location: Index_Author.php");
                exit;
            }
        }else{
            echo "SomeThing Wrong ! , Try Later ! ";
        }

    }

    mysqli_stmt_close($stmt);

}



$id = $Edit_Name = $Edit_Content = "";
$id_er = $Edit_Name_er = $Edit_Content_er = $Done_er =  "";

if(isset($_POST['Edit'])){


    $input_Name  = trim($_POST['name']);
    if(empty($input_Name)){
        $Edit_Name_er = "Enter The Author Name ! ";
    }else{
        $Edit_Name = $input_Name;
    }

     $input_Id  = trim($_POST['id']);
     if(empty($input_Id)){
         $id_er = "The Pr - my It's Empty ! ";
     }else{
         $id = $input_Id;
     }

    $input_Content = trim($_POST['content']); 
    if(empty($input_Content)){
        $Edit_Content_er = "Enter The Author Information ! ";
    }else{
        $Edit_Content = $input_Content;
    }


    if(empty($Edit_Name_er) && empty($Edit_Content_er) && empty($id_er)){
        $Sql_Update = "UPDATE cv SET p_name = ?, cv_conte = ? WHERE cv_id = ? ";
          
        if($stmt = mysqli_prepare($link,$Sql_Update)){
            mysqli_stmt_bind_param($stmt, "ssi", $param_name, $param_content,$param_id);

           $param_name    = $Edit_Name;
           $param_content = $Edit_Content;
           $param_id      = $id;

           if(mysqli_stmt_execute($stmt)){

            $_SESSION['msg'] = "Updated ";
            header("location:Index_Author.php");
            exit();
        }else{
            $Done_er = "No Update,There Is Wrong ! ";
            echo "Something's wrong with the query: " . mysqli_error($link);

        }
    }
     
        // Close connection
        mysqli_close($link);
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
             <h1> Modify Author Information </h1>
            </center>
            <center>
          
            
            <div class="bg-img">
            <a href="Index_Author.php"><button class="but-back" type="button">< Back</button></a>
            <p> <?php echo $Done_er ; ?>

          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " class="container">
             <label> The Author Name </label><br>
               <input type="text" name="name" value="<?php echo $author_name; ?>" required>
               <span class="error">*<?php echo $Edit_Name_er ; ?></span><br>
               
             <input type="hidden" name="id" value="<?php echo $author_id; ?>">

            
               <label> Author Information   </label><br><br>
               <textarea name="content" rows="100" cols="500">
               <?php echo $contnet_cv; ?>
               </textarea><br><br>
               <span>*<?php echo $Edit_Content_er ; ?> </span>

               <button type="submit" name="Edit" class="btn"> Edit </button> 
          </form>
      </div>
        </center>
    </body>
 </html>

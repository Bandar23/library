<?php


session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location: login.php");
    exit;
}

require_once 'config.php';

$name = $write_name = $brief = $sort = $book_Id = "";
if(isset($_GET['edit']) && !empty(trim($_GET['edit']))){

    $Sql = "SELECT * FROM books WHERE id = ?";

    if($stmt = mysqli_prepare($link,$Sql)){
        mysqli_stmt_bind_param($stmt, "i" , $param_Id);

        $param_Id = trim($_GET['edit']);

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($result) == 1 ){

                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                $book_Id = $row['id'];
                $name = $row['bk_name'];
                $pic = $row['pic'];
                $write_name = $row['r_name'];
                $brief = $row['brief'];
                $sort = $row['sort'];


            }else{
                header("location: index_Books.php");
                exit;
            }
        }else{
            echo "Ops! Somthing It's Wrong , Try Agien ! ";
        }
    }
    mysqli_stmt_close($stmt);

}


$id_er = $Book_name_er = $author_er = $brief_er = $department_er = "";
$id = $Book_name = $author = $Edit_brief = $department = "";

if(isset($_POST['Edit'])){


    $input_name = trim($_POST['name']);
    if(empty($input_name)){
       $Book_name_er = "Pleass Enter The Book Name ! ";
    }elseif(!filter_var(trim($input_name), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
      $Book_name_er = "Pleass Enter The Book Name ! ";
    }else{
       $Book_name  = $input_name;
    }

    $input_id = trim($_POST['id']);
    if(empty($input_id)){
        $id_er = "There Is Wrong ,Try Agine!";
    }else{
         $id = $input_id;
    }

    $input_author = trim($_POST['author']);
    if(empty($input_author)){
        $author_er = "Pleass Enter The Author Name ! ";
    }else{
        $author = $input_author;
    }

    $input_brife = trim($_POST['brief']);
    if(empty($input_brife)){
        $brief_er = "Enter The Brife ! ";
    }else{
        $Edit_brief = $input_brife;
    }

    $input_department = trim($_POST['dep']);
    if(empty($input_department)){
        $department_er = "Enter The Book Seacion ";
    }else{
        $department = $input_department;
    }

    if(empty($Book_name_er) && empty($id_er) && empty($author_er) && empty($brief_er) && empty($department_er)){
        $sql_Update = "UPDATE books SET bk_name = '$Book_name', r_name = '$author',brief = '$Edit_brief', sort = '$department' WHERE id = '$id' ";
        $result_Upadte = mysqli_query($link,$sql_Update);

        if($result_Upadte){
           $_SESSION['msg'] = "Updated ";
            header("location:index_Books.php");
            exit();
        }else{
            $Done_er = "No Update,There Is Wrong ! ";
        }


    }
        
        // Close connection
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
            </center>
            <center>
          
            
            <div class="bg-img">
            <a href="index_books.php"><button class="but-back" type="button">< Back</button></a>

          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " class="container">
             <label> The Book Name </label><br>
               <input type="text" name="name" value="<?php echo $name; ?>" required>
               <span class="error">* <?php  echo $Book_name_er; ?></span><br>
               
             <input type="hidden" name="id" value="<?php echo $book_Id; ?>">

             <label> The Author Name </label><br><br>
               <input type="text" name="author"  value="<?php echo $write_name; ?>" >
               <span class="error">*</span><br>

               <label> Brife   </label><br><br>
               <textarea name="brief" rows="100" cols="500">
               <?php echo $brief; ?>
               </textarea><br><br>

               <label> Section </label><br><br>
               <input type="text" name="dep"  value="<?php echo $sort; ?>" >
               <span class="error">*</span><br><br>
              
               <button type="submit" name="Edit" class="btn"> Edit </button> 
          </form>
      </div>
        </center>
    </body>
 </html>

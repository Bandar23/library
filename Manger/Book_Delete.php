<?php 

session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location:login.php");
    exit;
  }




  if(isset($_GET['del']) && !empty(trim($_GET['del']))){

    require_once 'config.php';

    $Delete_Sql =" DELETE FROM books WHERE id = ? ";
    if($stmt = mysqli_prepare($link, $Delete_Sql)){
        mysqli_stmt_bind_param($stmt ,"i", $param_id);

        $param_id = trim($_GET['del']);

        if(mysqli_stmt_execute($stmt)){
            $_SESSION['msg'] = "Deleted ";
            header("location: index_Books.php");
            exit();
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);


  }else{
      echo "Ops";
  }



?>

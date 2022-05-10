<?php



session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location: login.php");
    exit;

}


if(isset($_GET['del']) && !empty(trim($_GET['del']))){

    require_once 'config.php';

    $Del_Sql = "DELETE FROM cv WHERE cv_id = ?";

    if($stmt = mysqli_prepare($link,$Del_Sql)){
        mysqli_stmt_bind_param($stmt, "i" , $param_id);

        $param_id = trim($_GET['del']);

        if(mysqli_stmt_execute($stmt)){
            $_SESSION['msg'] = "Deleted ";
            header("location:Index_Author.php");
            exit();
        }else{
            $_SESSION['msg'] = "There's Wrong, Try Later ! ";
            header("location:Index_Author.php");
            exit();
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}




?>
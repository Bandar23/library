<?php 


session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location: login.php");
    exit;
}



if(isset($_GET['del']) && !empty(trim($_GET['del']))){
    require_once 'config.php';


    $sql_Delete = "DELETE FROM articles WHERE p_no = ? ";

    if($stmt = mysqli_prepare($link,$sql_Delete)){

    mysqli_stmt_bind_param($stmt, "i", $id_Param);

    $id_Param = trim($_GET['del']);

    if(mysqli_stmt_execute($stmt)){
        $_SESSION['msg'] = "Deleted";
        header("location: index.php");
        exit();
    }else{
        $_SESSION['msg'] = "There's Wrong, Try Later ! ";
        header("location:index.php");
        exit();
    }

   mysqli_stmt_close($stmt);
}

  mysqli_close($link);
}

?>
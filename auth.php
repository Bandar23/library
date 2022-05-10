<?php 

include 'disingBo.php';
require_once 'config.php';

if(isset($_GET['aut'])){
    $sql = "SELECT * FROM cv WHERE cv_id = ?";
    if($stmt = mysqli_prepare($link,$sql)){
        mysqli_stmt_bind_param($stmt,"i",$id_param);

        $id_param = trim($_GET['aut']);

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                $Author_Name = $row['p_name'];
                $image       = $row['p_pic'];
                $cv          = $row['cv_conte'];

            }else{
                header("location: error.php");
                exit();
            }
        }else{
            echo "Oops! Something went wrong. Please try again later.";
    }
}

mysqli_stmt_close($stmt);
}else{
    echo " Wrong ! !";
}


?>

<!DOCTYPE html>
    <html>
        <head>
        <title><?php echo $Author_Name; ?></title>
        <link rel="icon" href="images/wbelogo.png" type="image/png">



           <style>
               img {
                  border-radius: 50%;
                  border:  3px solid #777;
               }
               #bo{
                border:  3px solid #777;
               }
           </style>
        </head>
        <body>
        <br />
        <section>
        <div id="bo">
       <h1> <?php echo $Author_Name; ?> </h1>
       <?php   echo "<img src='images/".$image."'\"width=\"200px\" height=\"300px\">"; ?>
       <p> <?php echo $cv; ?> </p><br><br>
       </div>
       <section>



        </body>
    </html>

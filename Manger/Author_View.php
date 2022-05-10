<?php 

session_start();

if(!isset($_SESSION['Admin_Email'])){
    header("location: login.php");
    exit;
}

if(isset($_GET['view']) && !empty(trim($_GET['view']))){
    require_once 'config.php';

    $View_Sql = "SELECT * FROM cv WHERE cv_id = ? ";

    if($stmt = mysqli_prepare($link,$View_Sql)){
        mysqli_stmt_bind_param($stmt, "i" , $param_Id);
        $param_Id = trim($_GET['view']);

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                $name = $row['p_name'];
                $pic = $row['p_pic'];
                $cv = $row['cv_conte'];
                $Cv_id = $row['cv_id'];
                $Read_Done = $row['read_done'];

                $Sql_Read = "UPDATE cv SET read_done = read_done + 1 WHERE cv_id = '". $Cv_id."' ";
                $result_read_Done = mysqli_query($link,$Sql_Read);

                if(!$result_read_Done){
                     
                    echo "Something's wrong with the query: " . mysqli_error($link);

                }
                

            }else{
                $_SESSION['msg'] = "There Is Wrong !";
                header("location:Index_Author.php");
                exit();

            }

        }else{
            echo " Oops ! Somthing Went Wrong. Try Agian";

        }

        mysqli_stmt_close($stmt);


    }

    mysqli_close($link);
}





?>




<!DOCTYPE html>
    <html>
        <head>
        <link rel="stylesheet" href="AllStyle.css" type="text/css">
        <title>The Author:<?php echo $name; ?> </title>

           <style>
               img {
                  border-radius: 50%;
                  border:  3px solid #777;
               }
               #bo{
                border:  3px solid #777;
               }
               .b{
                   color:black;
               }
           </style>
        </head>
        <body>
        <br />
        <section>
        <a href="Index_Author.php"><button class="but-back" type="button"> < < Back</button></a>

        <div id="bo">
        <center>
       <h1> <?php echo $name; ?> </h1>
       <?php   echo "<img src='../images/".$pic."'\"width=\"200px\" height=\"300px\">"; ?>
       </center>

       <p class="b">  <?php echo $cv; ?> </p><br><br><br>
       </div>
       <span> Read Done : <?php echo $Read_Done; ?> </span>
       </section>

     



        </body>
    </html>

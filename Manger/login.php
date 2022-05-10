<?php

session_start();

require_once 'Config.php';
 
$Email = $Password = "" ; 
$Email_er = $Password_er = $Err = "";

if(isset($_POST['login']) && !empty($_POST['login'])){

    $input_Email = trim($_POST['email']);
    if(empty($input_Email)){
        $Email_er = "Please Enter Your Email! ";
    }elseif(!filter_var($input_Email,FILTER_VALIDATE_EMAIL)){
        $Email_er = "This Email It's Not Valid! ";
    }else{
        $Email = $input_Email;
    }

    $input_Password = trim($_POST['password']);
    if(empty($input_Password)){
        $Password_er = "Please Enter Your Password !";
    }else{
        $Password = $input_Password;
    }

    if(empty($Email_er) && empty($Password_er)){

    $Sql = "SELECT * FROM user WHERE user_email = '$Email' ";
    $Sql_Result = mysqli_query($link,$Sql);

    $row = mysqli_fetch_array($Sql_Result);
    $DB_Password = $row['user_password'];
    $DB_Atuz = $row['user_mangaer'];
    $num = mysqli_num_rows($Sql_Result);

    if($num == 1 ){
        if($Password == $DB_Password){
            $query  = "SELECT * FROM user WHERE user_email = '$Email' ";
            $result_Query = mysqli_query($link,$query);
            $Admin_Row = mysqli_fetch_array($result_Query);
            $Admin_UserName = $Admin_Row['user_name'];
            $Admin_Email = $Admin_Row['user_email'];

            $_SESSION['Admin_User_Name'] = $Admin_UserName;
            $_SESSION['Admin_Email'] = $Admin_Email;

            header("location: Manag.php");
        }else{
            $Err = "The Password OR Email It's Not Correct !";
        }
    }else{
        $Err = "The Password OR Email It's Not Correct !";
    }
}

}






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title> Login</title>
<link rel="stylesheet" href="AllStyle.css">
</head>
<body>
<div class="header">
  	<h2>LOGIN </h2>
      <span class="error"><?php echo $Err; ?></span><br><br>
  </div>
    
                    <div class="border-form">
                    <div class="form-log" drl="left">
                      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                      <div class="input-group">
                      <span class="error"></span><br><br>

                        <label>Email</label><br>
                         <input  class="inpu" type="email" name="email" placeholder="Enter Your Email"><br><br>
                         <span class="error"><?php echo $Email_er; ?></span><br><br>

                          </div>           

                         <div class="input-group">
                         <label>Password</label><br>
                         <input class="inpu" type="password" name="password" placeholder="Enter Your Password" reuirde><br><br>
                         <span class="error"><?php echo $Password_er; ?></span><br><br>

                         </div>                         


      
                         <input class="btn" type="submit" name="login" value="Singin"><br><br>
      
                      </form>
                    </div> 
                   </div>

                   <div class="im-border">
	   <div class="TheImage">
                    <img id="imgl" src="M_img/writer.jpg" alt="Writer" width="100%" height="105%">
                    </div>
    </div>
</div>

</body>
</html>
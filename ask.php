<?php 
include 'disingBo.php';
require_once 'config.php';

$email = $phone = $ask = "";
$email_rr = $phone_rr = $ask_rr = "";

$All_Tags = array("<h1>",
                  "<h2>",
                  "<h3>",
                  "<h4>");


if(isset($_POST['Save'])){

    $input_email = trim($_POST['email']);
    if(empty($input_email)){
        $email_rr = "-- Enter your Email";
    }elseif(!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)){
        $email_rr = "is not a valid email address";
    }else{
        $email = $input_email;
    }

    $input_phone = trim($_POST['phone']);
    if(empty($input_phone)){
        $phone_rr = "--- Enter Your Email";
    }elseif(!filter_var(trim($_POST['phone']), FILTER_VALIDATE_INT) === false){
        $phone_rr = "The Phone Number is not valid";
    }else{
        $phone = $input_phone;
    }

    $input_ask = trim($_POST['ask']);
    if(empty($input_ask)){
        $ask_rr = "--- Enter Your Ask ! ";
    }else{

      $ask = filter_var($input_ask,FILTER_SANITIZE_STRING);
        
    }

    if(empty($email_rr) && empty($phone_rr) && empty($ask_rr)){
        $sql = "INSERT INTO questions(as_email,as_phone, as_ask) VALUES (? ,? ,?)";

        if($stmt = mysqli_prepare($link,$sql)){
            mysqli_stmt_bind_param($stmt,"sss",$param_email,$param_phone,$param_ask);

            $param_email = $email;
            $param_phone = $phone;
            $param_ask = $ask;

         if(mysqli_stmt_execute($stmt)){
             header("location: ask.php");
             exit();
         }
        }
        mysqli_stmt_close($stmt);
    }
 mysqli_close($link);

}




?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
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
  max-width: 600px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #8B4513;
  color: white;
  padding: 16px 20px;
  border: none;
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
  border: none;
  background: #f1f1f1;
  background-color: #ddd;
  outline: none;

}
</style>
</head>
<body>

<h2>Ask Us !</h2>
<div class="bg-img">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST" class="container">
    <h1>Ask your question here</h1>

    <label for="email"><b>Your Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required onkeyup="emailFunction()"><br>
    <span id="demo"></span>
    <span class="error "><?php echo $email_rr ; ?> </span><br>

    <label for="phone"><b>Your Number</b></label>
    <input type="number" placeholder="Enter your Phone Number" name="phone" id="number" required onkeyup="numberFunction()"><br>
    <span id="NumberValid"></span>
    <span class="error "><?php echo $phone_rr ; ?> </span><br>


    <label for="phone"><b>Your Ask</b></label>
    <textarea placeholder="Enter your Ask" name="ask" required rows="9" cols="20"></textarea>
    <span class="error ">*<?php echo $ask_rr ; ?> </span><br>


    <button type="submit" name="Save" class="btn" id="button">Send</button>
  </form>
</div>


<script src="mainJs.js"></script>
</body>
</html>

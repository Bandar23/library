
 <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="library";


$link = mysqli_connect($servername, $username, $password, $dbname) or die($link);
//echo "Connected successfully";



if(isset($_POST['Save'])){
    $name= $_POST['name'];
    $errors= array();
    $file_name = $_FILES['pic']['name'];
    $file_size = $_FILES['pic']['size'];
    $file_tmp = $_FILES['pic']['tmp_name'];
    $file_type = $_FILES['pic']['type'];
    $temp= explode('.',$file_name);
    $file_te = end($temp);
         
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_te,$extensions) === false){
       $errors[]="extension not allowed, please choose a JPEG or PNG or png file.";
    }
    
    if($file_size > 2097152) {
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true) {
       move_uploaded_file($file_tmp,"images/".$file_name);
       //echo "Success";
    }else{
       print_r($errors);
    }
    //$image  = $_FILES['pic']['name']; 
    //$target = "images/".basename($image);
    $author= $_POST['author'];
    $brief = mysqli_real_escape_string($link,$_POST['brief']);
    $dep= $_POST['dep'];


    $query = mysqli_query($link,"INSERT INTO books (bk_name,pic,r_name,brief,sort,D_ate) VALUES
     ('$name','$file_name','$author','$brief','$dep',SYSDATE())");

    if(!$query){
      echo "Error: " . mysqli_error($link);
      }else{
         header("location:index_Books.php");
         exit;
      }

   }



 





?>
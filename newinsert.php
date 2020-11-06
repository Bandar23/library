
 <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="library";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn) {
    die("Connection failed: " . mysqil_connect_error());
}
//echo "Connected successfully";



if(isset($_POST['Save'])){
    $name= $_POST['name'];
    $errors= array();
    $file_name = $_FILES['pic']['name'];
    $file_size = $_FILES['pic']['size'];
    $file_tmp = $_FILES['pic']['tmp_name'];
    $file_type = $_FILES['pic']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['pic']['name'])));
         
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152) {
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true) {
       move_uploaded_file($file_tmp,"images/".$file_name);
       echo "Success";
    }else{
       print_r($errors);
    }
    //$image  = $_FILES['pic']['name']; 
    //$target = "images/".basename($image);
    $author= $_POST['author'];
    $brief= $_POST['brief'];
    $dep= $_POST['dep'];


    $query = "INSERT INTO books (bk_name,pic,r_name,brief,sort) VALUES ('$name','$file_name','$author','$brief','$dep')";

    

    mysqli_query($conn,$query);
    $_SESSION['ads'] = " Inserting ";
    header('location: insert.php'); 

   }



 





?>
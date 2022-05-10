<?php 

require_once 'config.php';


$search = $_GET['search'];


if(!empty($search)){

    $sql = "SELECT * FROM cv WHERE p_name LIKE '%$search%'";
    $result = $link->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){ ?>
          
         <div id="CO">
         <a style="color:Black;" href="auth.php?aut= <?php echo $row['cv_id']; ?>">
          <?php echo $row['p_name'];  ?>
      </a> 
      </div>
      <br/>
 

<?php         
        }
    }else{
        echo " 0 Result ! ";
    }
}else {
    echo "Enter The Author Name ";
}

?>

<html>
<head>
<style>

</style>


<?php 


?>

<div id="nav">
<a href="manag.php"><button class="button1" type="button">Main Page</button></a>
    <a href="index_Articles.php"><button class="button1" type="button">Articles Management</button></a> 
    <a href="Service_New.php"><button class="button1" type="button">New Section </button></a> 
    <a href="Index_Author.php"><button class="button1" type="button">Authors Management</button></a>
    <a href="index_Books.php"><button class="button1" type="button">Books Management</button></a>
    <a href="logout.php"><button class="button1" type="button" > LogOut</button></a> 
    <div id="user-div">               
            <p class="text-right" id="user-name"> Welcom <b><?php echo $_SESSION["Admin_User_Name"] ?></b></p> 
            <img id="user-icon" src="M_Img/administrator.png">
   
        </div>
</div>
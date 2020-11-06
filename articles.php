 <?php 

include 'disingBo.php';

 
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="library";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn) {
    die("Connection failed: " . mysqil_connect_error());
}
//echo "Connected successfully";


$sql = mysqli_query($conn,"SELECT * FROM articles");


?>
<!Doctype html>
<html>
<head>
  <style>
  
    #show{
      color:red;
    }
    #bo{
  border:  3px solid #777;

  }
  #name{
    color:Blue;
  }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Blog Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/blog/">

    <!-- Bootstrap core CSS -->
<link href="/book/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=brhw8TzIqnoCDTRFdP66SydMlfx4nbxEA-yiQUMyid5cMUUOP6NrOPuVqeL0P_U7P2Nvk7vHqMJg0VuTKVSGSwFfSTLiKhy_Yo8dH4ARAyk" charset="UTF-8"></script><style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
 </style>
<br>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">N</th>
      <th scope="col">The Name Of The Article</th>
      <th scope="col">The Name Of The Author</th>
      <th scope="col">Article Type</th>
      <th scope="col">Display</th>

    </tr>
  </thead>
  <tbody>
  <?php  while($row = mysqli_fetch_array($sql)){ ?>

    <tr>
      <th scope="row"> <?php echo " - "; ?></th>
      <td id="name"> <?php echo $row['name_m']; ?></td>
      <td> <?php echo $row['author']; ?></td>
      <td> <?php echo $row['t_ype']; ?></td>
   <td><a id="show" href="viewA.php?show=<?php echo $row['p_no']; ?> ">View</a></td> 
      <?php } ?>
    </tr>
  </tbody>
</table>

</div>
</body>
</html>
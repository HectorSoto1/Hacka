<!doctype html>
<html lang="en">
  <head>
    <title>Panel Profin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <?php
    $pageId=$_GET['page'];
require_once('includes/db-conect.php');
$queryPage = "SELECT * FROM pages where PageID = ".$pageId." order by id desc";
$query = "SELECT * FROM feed where PageID = ".$pageId." order by id desc"; // select page already in database or not query.
$resultPages =mysqli_query($connection,$queryPage);
$result = mysqli_query($connection,$query); 

?>
   <div class="container-fluid">
    <?php 
while ($row=mysqli_fetch_array($resultPages)) {
  ?>
<div class="row justify-content-md-center">
  <br>
  <br>
       <h3>Nombre:<?php echo $row['Name'];?></h3>&nbsp;&nbsp;&nbsp;
       <br>
       <br>
       <h3>Likes:<?php echo $row['Likes'];?></h3>&nbsp;&nbsp;&nbsp;
       <br>
       <br>
       <h3>Gente que habla de: <?php echo $row['Talking'];?></h3>
       <br>
       <br>
     </div>
     <br>
     <br>
  <?php
}
     ?>
     
     <?php
        while($rowsFeed = mysqli_fetch_array($result))
        {
        ?>
     <div class="row">
       <div class="col">
         <img src="<?php echo $rowsFeed['Picture'];?>" /><br>
         <?php echo $rowsFeed['Post'];?>
       </div>

       <div class="col">
         FECHA: <?php echo $rowsFeed['Date'];?>
        <br>LIKES: <?php echo $rowsFeed['Likes'];?>
        <br>COMENTARIOS: <?php echo $rowsFeed['Comments'];?>
        <br>COMPARTIDOS: <?php echo $rowsFeed['Shares'];?>
       </div>
     </div>
     <hr>
     <?php
        }
      ?>
   </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
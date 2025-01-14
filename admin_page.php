<?php


session_start();
//print_r($_SESSION['admin']);die;
 if(!isset($_SESSION['admin'])){
   header('location:login_page.php');
} 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title><!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome back, <span><?php echo $_SESSION['admin']->name.'!'; ?></span></h1>
      <p>this is an admin page</p>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>
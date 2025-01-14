<?php
session_start();
include_once "models/User.php";

if (isset($_POST['submit'])){
   //print_r($_POST);die;
//if form is submited -> search for the userobj in the db 
$userobj = new User;

$userobj->setEmail($_POST['email']) ;
$userobj->setPassword(sha1($_POST['password']));

$LoginResult = $userobj->login();
//if user is found in the db
if($LoginResult){
   $user = $LoginResult->fetch_object();
   if($user->user_type == 'admin'){
      //save admin name in the sessioh &go to the admin page
      $_SESSION['admin'] =$user;
      header('location:admin_page.php');

   }elseif($user->user_type == 'user'){
      //save user name in the sessioh &go to the user page
      $_SESSION['user'] = $user;
      header('location:user_page.php');

   }
   
    
}
//no user found in the db 
else{
//error message 'The username and/or password you specified are not correct.'
$error['login'] = 'The username and/or password you specified are not correct.';

}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      //You entered an incorrect userobjname or password. Please try again or try resetting your password.
      if(isset($error)){
          foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>'; 
          }
         
      }
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</div>

</body>
</html>
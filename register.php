<?php
include_once 'models/User.php';
//if form is submitted
if (isset($_POST['submit'])) {
    //connect to db
    if ($_POST['password'] != $_POST['password_confirm']) {
        $error['password_confirm'] = 'The passwords you entered do not match.';
    } else {
        $userobj = new User;

        $userobj->setEmail($_POST['email']);
        $SearchUserResult = $userobj->search();
        //if user does not exist, insert user to db
        if (empty($SearchUserResult)) {
            $userobj->setName($_POST['name']);
            $userobj->setPassword(sha1($_POST['password']));
            $userobj->setUser_type($_POST['user_type']);
            //add new user
            $InsertionResult = $userobj->create();
            //user has been added successfully
            if ($InsertionResult) {
                header('location:login.php');
            } else {
                $error['register'] = 'somthing went wrong, try again later';
            }
        }


        //user already exists
        else {
            $error['register'] = 'user already exist!';
            //print_r($error);die;
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>register now</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="password_confirm" required placeholder="confirm your password" value="">


            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>

    </div>

</body>

</html>
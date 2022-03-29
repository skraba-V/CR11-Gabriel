<?php

session_start();
require_once 'components/db_connect.php';

if (isset($_SESSION['user']) ){
    header("Location: home.php");
    exit;
}

if (isset($_SESSION['adm']) ){
    header("Location: home.php");
    exit;
}

$error = false;
$email = $password = $emailError = $passError = '';

if (isset($_POST['btn-login'])) {

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    if (empty($email)) {
        $error = true;
        $emailError = "Please enter your email address.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }

    if (empty($pass)) {
        $error = true;
        $passError = "Please enter your password.";
    }

    
    if (!$error) {

        $password = hash('sha256', $pass); 

        $sql = "SELECT user_id, first_name, password, status FROM user WHERE email = '$email'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if ($count == 1 && $row['password'] == $password) {
            if ($row['status'] == 'adm') {
                $_SESSION['adm'] = $row['user_id'];
                header("Location: dashboard.php");
            } else {
                $_SESSION['user'] = $row['user_id'];
                header("Location: home.php");
            }
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
        }
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login & Registration System</title>
    <?php require_once 'components/boot.php' ?>
</head>

<body class="bbc">
  <?php require_once 'components/navigation.php' ?>

    <div class="container justify-content-center">
        <div class="row justify-content-center text-center">
            <form class="col-6 dit nsl2" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <h2>Login</h2>
                <p>adm: wall@mail.com   usr: some@mail.com  pass: 123456</p>
                <?php
                if (isset($errMSG)) {
                    echo $errMSG;
                }
                ?>
    
                <input type="email" autocomplete="off" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                <span class="text-danger"><?php echo $emailError; ?></span>
                <div class="nsl"></div>
    
                <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                <span class="text-danger"><?php echo $passError; ?></span>
                <div class="nsl"></div>
                
                <button class="btn btn-block btn-primary" type="submit" name="btn-login">Sign In</button>
                
                <a class="btn btn-block btn-secondary" href="register.php">Register</a>
            </form>

        </div>
    </div>
</body>
</html>
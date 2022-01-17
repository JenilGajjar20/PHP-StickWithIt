<?php
    include 'partials/_dbconnect.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        header("Location: login.php");
    }

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $confirmPassword = md5($_POST['confirmPassword']);

        // Check whether username exists or not
        $existSql = "SELECT * FROM `users` WHERE username = '$username'";
        $result = mysqli_query($conn, $existSql);
        $numExistRow = mysqli_num_rows($result);
        if($numExistRow > 0)
        {
            echo "<script>alert('Username already exists. Try unique username!')</script>";
        }
        else
        {
            if($password == $confirmPassword)
            {
                // Check whether email exists or not
                $sql = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    echo "<script>alert('Oops..! Email already exists. Try again')</script>";
                }
                else
                {
                    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
                    $result = mysqli_query($conn, $sql);
                    if(!$result)
                    {
                        echo "<script>alert('Oops..! Something went wrong. Try again')</script>"; 
                    }
                    else
                    {
                        echo "<script>alert('WOW. You are registered successfully')</script>";
                        header("Location: login.php");
                    }
                }
            } 
            else 
            {
                echo "<script>alert('Passwords did not match. Try again...!')</script>";
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
    <title>StickWithIt || Register</title>
    <style>
    <?php include 'css/style.css';
    ?>
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="register__form">
            <p class="register__text">Register to StickWithIt</p>
            <div class="input__group">
                <input type="text" name="username" placeholder="Username" required />
                <p>Username should be unique</p>
            </div>
            <div class="input__group">
                <input type="email" name="email" placeholder="Email" required />
                <p>Email should be different and unique</p>
            </div>
            <div class="input__group">
                <input type="password" name="password" placeholder="Password" required />
            </div>
            <div class="input__group">
                <input type="password" name="confirmPassword" placeholder="Confirm Password" required />
            </div>
            <div class="input__group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register__text">Have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>
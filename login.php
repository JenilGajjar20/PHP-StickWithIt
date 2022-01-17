<?php
    include 'partials/_dbconnect.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        header("Location: home.php");
    }

    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: home.php");
        }
        else 
        {
            echo "<script>alert('Oops..! Email or Password is Wrong. Try again')</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StickWithIt || Login</title>
    <style>
    <?php include 'css/style.css';
    ?>
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login__form">
            <p class="login__text">Login to StickWithIt</p>
            <div class="input__group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input__group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input__group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="forget__password"><a href="updatePassword.php">Forget Password?</a></p>
            <p class="login-register__text">Don't have an account? <a href="register.php">Register here</a>.</p>
        </form>
    </div>
</body>

</html>
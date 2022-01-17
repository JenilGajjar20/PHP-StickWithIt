<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StickWithIt || Update Password</title>
    <style>
    <?php include 'css/style.css';
    ?>
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
        include 'partials/_dbconnect.php';
    ?>
    <?php
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $newPassword = md5($_POST['password']);

            $sql = "UPDATE users SET password='$newPassword' WHERE username='$username' AND email='$email'";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                echo "<script>
                        alert('$_POST[username] your Password updated successfully'); 
                        window.location='login.php';
                    </script>";
            }
        }
?>
    <div class="container">
        <form action="" method="POST" class="changePassword__form">
            <p class="changePassword__text">Change Password</p>
            <div class="input__group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input__group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input__group">
                <input type="password" name="password" placeholder="New Password" required>
            </div>
            <div class="input__group">
                <button name="submit" type="submit" class="btn">Update</button>
            </div>
            <p class="back__to__login"><a href="login.php">Back to Login</a></p>
        </form>
    </div>
</body>

</html>
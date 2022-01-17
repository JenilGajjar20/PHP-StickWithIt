<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StickWithIt || Edit Profile</title>
    <style>
    <?php include 'css/editDetails.css';
    ?>
    </style>
</head>

<body>
    <?php
        include 'partials/_dbconnect.php';
        session_start();
        include 'partials/_navbar.php';
    ?>
    <?php
        $sql = "SELECT * FROM users WHERE username='$_SESSION[username]'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while($row = mysqli_fetch_assoc($result))
        {
            $uname = $row['username'];
            $email = $row['email'];
            $contact = $row['user_contact'];
            $userImage = $row['user_image'];
        }
    ?>
    <div class="container">
        <h2>Update Details</h2>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input__group">
                <input type="text" name="username" value="<?= $uname; ?>">
            </div>
            <div class="input__group">
                <input type="email" name="email" value="<?= $email; ?>">
            </div>
            <div class="input__group">
                <input type="number" name="contact" value="<?= $contact ? $contact : "Enter your Contact"; ?>">
            </div>
            <div class="input__group file">
                <input type="file" name="file" required>
            </div>
            <div class="input__group">
                <button name="submit" type="submit" class="btn">Save</button>
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['submit']))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], "image/" . $_FILES['file']['name']);

            $uname = $_POST['username'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $userImage = $_FILES['file']['name'];

            $sql1 = "UPDATE users SET user_image='$userImage',user_contact='$contact', username='$uname', email='$email' 
                    WHERE username='$_SESSION[username]'";

            if(mysqli_query($conn, $sql1))
            {
                echo "<script>alert('Updated Successfully.You have to login again...!');
                            window.location='logout.php';
                        </script>";
            }
        }
    ?>
    <?php
        include 'partials/_footer.php';
    ?>
</body>

</html>
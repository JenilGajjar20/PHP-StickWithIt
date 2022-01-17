<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StickWithIt || Profile</title>
    <style>
    <?php include 'css/profile.css';
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
        $username = isset($_GET['username']) ? $_GET['username'] : '';
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $userImage = $row['user_image'];
            $userContact = $row['user_contact'];
        }
    ?>
    <div class="container">
        <div class="profile__image">
            <?php
            if($userImage){
                echo "<img class='user__image' src='image/$userImage' alt='...'>";
            } else {
                echo "<img class='user__image' src='image/user.jpg' alt='...'>";
            }
            ?>
        </div>
        <div class="profile__details">
            <h2 class="user__name"><?= $username; ?></h2>
            <p class="member">Member of <span>StickWithIt</span></p>
        </div>
    </div>
    <div class="user__details">
        <h4 class="heading">User Details</h4>
    </div>
    <table>
        <tr>
            <th>Email Address:</th>
            <td><?= $email; ?></td>
        </tr>
        <tr>
            <th>Contact Number:</th>
            <td><?= $userContact ? "+91-" . $userContact : "<span style='color: gray;'>Enter your Contact</span>"; ?>
            </td>
        </tr>
    </table>
    <div class="image__upload">
        <a href="editDetails.php" class="btn">Edit Details</a>
    </div>
    <?php
        include 'partials/_footer.php';
    ?>
</body>

</html>
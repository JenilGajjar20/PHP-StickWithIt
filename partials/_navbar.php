<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/97fb8c75cd.js" crossorigin="anonymous"></script>
    <style>
    <?php include 'css/_navbar.css'?>
    </style>
</head>

<body>
    <div class="swiLogo__container">
        <img src="image/SWI_Image.jpg" alt="...">
    </div>
    <h2 class="welcome__user">Welcome <span><?php echo $_SESSION['username']; ?></span></h2>
    <header>
        <div class="menu-toggle"></div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="viewCart.php">View Cart</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="profile.php?username=<?= $_SESSION['username']; ?>">Profile</a>
                </li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.menu-toggle').click(function() {
            $('.menu-toggle').toggleClass('active');
            $('nav').toggleClass('active');
        });
    });
    </script>
</body>

</html>
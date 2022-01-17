<?php
    include 'partials/_dbconnect.php';
    session_start();
    include 'partials/_navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/SWI_CroppedFavIcon.png" type="image/x-icon">
    <title>StickWithIt || About</title>
    <style>
    <?php include 'css/about.css';
    ?>
    </style>
</head>

<body>
    <div id="fb-root"></div>
    <div id="fb-root"></div>
    <div id="fb-root"></div>
    <div class="about__container">
        <h2 class="heading">Welcome to StickWithIt</h2>
        <hr>
        <div class="section1">
            <div class="container1">
                <div class="content__section">
                    <div class="about__title">
                        <h2>About <span>StickWithIt</span></h2>
                    </div>
                    <div class="about__content">
                        <p>Welcome to <span>StickWithIt</span>. We started our journey in 2018
                            and now completed three years. Your
                            support and cooperation have always been with us. </p>
                        <p>Come once and you will <span>StickWithIt</span>.🧇🥞🍟🍫</p>
                    </div>
                </div>
            </div>
            <div class="image__section">
                <img src="image/SWI_Image.jpg" alt="...">
            </div>
        </div>
        <div class="section2">
            <div class="container2">
                <div class="location__section">
                    <div class="location__title">
                        <h2>Loca<span>tion</span></h2>
                    </div>
                    <div class="location__content">
                        <p><b>Address</b>: Urban Chowk, Opp Kali Bari temple, off SP ring road, Rajpath Rangoli Rd,
                            Ahmedabad, Gujarat 380059</p>
                        <p><b>Hours</b>: <span id="time">Closed &sdot; Opens 7&nbsp;P.M.</span></p>
                        <p><b>Phone</b>: 096878 26345</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section3">
            <div class="container3">
                <div class="followUs__section">
                    <div class="followUs__title">
                        <h2>Follow <span>Us</span></h2>
                    </div>
                    <div class="icons">
                        <a href="https://www.instagram.com/beststickwithit/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/beststickwithit" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'partials/_footer.php';
    ?>

    <script>
    let date = new Date();
    let hours = date.getHours();
    if (hours >= 19 && hours < 22) {
        document.getElementById('time').innerHTML =
            "Opened &sdot; Closes 10&nbsp;P.M.";
    }
    </script>
</body>

</html>
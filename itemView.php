<?php
    session_start();

    if(!isset($_SESSION['username']))
    {
        header("Location: login.php");
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/97fb8c75cd.js" crossorigin="anonymous"></script>
    <title>StickWithIt || ItemView</title>
    <style>
    <?php include 'css/itemView.css';
    ?>
    </style>
</head>

<body>
    <?php
        include 'partials/_dbconnect.php';
        include 'partials/_navbar.php';
    ?>

    <?php
        $id = isset($_GET['itemId']) ? $_GET['itemId'] : '';
        $sql = "SELECT * FROM items WHERE item_id='$id'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $item_id = $row['item_id'];
            $item_name = $row['item_name'];
            $item_description = $row['item_description'];
            $item_image = $row['item_image'];
            $item_price = $row['item_price'];
        }
    ?>

    <div class="itemScreen">
        <div class="itemScreen__left">
            <div class="left__image">
                <img src="<?= $item_image; ?>" alt="...">
            </div>
            <div class="left__info">
                <p class="left__name"><?= $item_name; ?></p>
                <p class="left__description"><?= $item_description; ?></p>
                <p class="left__price">Price: <span><i class="fas fa-rupee-sign"></i>&nbsp;<?= $item_price; ?>/-</span>
                </p>
            </div>
        </div>
        <div class="itemScreen__right">
            <form action="cartProcess.php" method="get">
                <div class="right__info">
                    <p><span>Qty: </span><input type="number" value="1" name="qty" min="1" max="10"></p>
                    <p>
                        <input type="hidden" name="itemId" value="<?= $item_id; ?>">
                        <button type="submit">Add to Cart</button>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <?php
        include 'partials/_footer.php';
    ?>
</body>

</html>

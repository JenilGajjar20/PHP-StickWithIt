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
    <link rel="shortcut icon" href="image/SWI_CroppedFavIcon.png" type="image/x-icon">
    <title>StickWithIt || Home</title>
    <style>
    <?php include 'css/home.css';
    ?>
    </style>
</head>

<body>
    <?php
        include 'partials/_dbconnect.php';
        include 'partials/_navbar.php';
    ?>

    <div class="container">
        <h2 class="homescreen__heading">Explore Categories</h2>
        <hr>
        <div class="homescreen__products" id="homescreen__products">
            <?php
            // Results per page
        $resultsPerPage = 12;
        
        $sql = "SELECT * FROM items";
        $result = mysqli_query($conn, $sql);
        $numOfResults = mysqli_num_rows($result);

        // Number of total pages available
        $numOfPages = ceil($numOfResults / $resultsPerPage);

        // Determine which page number user is currently on
        if(!isset($_GET['page']))
        {
            $page = 1;
        }
        else
        {
            $page = $_GET['page'];
        }

        // SQL query LIMIT starting number for the results on the displaying page
        $firstPageResult = ($page - 1) * $resultsPerPage;

        // Retrive the selected results from database and display on the page
        $sql = "SELECT * FROM items LIMIT " . $firstPageResult . "," . $resultsPerPage;
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)):
        
    ?>
            <div class="product">
                <img src="<?= $row['item_image']; ?>" alt="...">
                <div class="product__info">
                    <p class="title__info"><?= $row['item_name']; ?></p>
                    <p class="description__info"><?= substr($row['item_description'], 0 ,90) . '...'; ?></p>
                    <p class="price__info"><i class="fas fa-rupee-sign"></i>&nbsp;<?= $row['item_price']; ?>/-</p>
                </div>
                <div class="product__btns">
                    <?php
                    $sql2 = "SELECT * FROM `items` WHERE `item_id` = 1";
                    $result2 = mysqli_query($conn, $sql2) or die("Query Failed");
                    while($row1 = mysqli_fetch_assoc($result2)){
                        $id = $row['item_id'];
                        $item_name = $row['item_name'];
                        $item_description = $row['item_description'];
                        $item_image = $row['item_image'];
                        $item_price = $row['item_price'];
                        
                        echo '<form>
                                    <input type="hidden" class="iid" value="'.$id.'">
                                    <input type="hidden" class="iname" value="'.$item_name.'">
                                    <input type="hidden" class="iname" value="'.$item_description.'">
                                    <input type="hidden" class="iimage" value="'.$item_image.'">
                                    <input type="hidden" class="iprice" value="'.$item_price.'">
                                <a href="itemView.php?itemId='.$id.'" class="btn">View Item</a>
                                </form>';
                            }
                            ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="page__links">
        <?php
            // Display the links to the page
            for($page = 1; $page <= $numOfPages; $page++)
            {
                echo "<a href='home.php?page=$page'>". $page ."</a>";
            }
        ?>
    </div>


    <?php
        include 'partials/_footer.php';
    ?>

</body>

</html>
<?php
    include 'partials/_dbconnect.php';
    
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: login.php");
    }
    include 'partials/_navbar.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/SWI_CroppedFavIcon.png" type="image/x-icon">
    <style>
    <?php include 'css/viewCart.css';
    ?>
    </style>
    <title>StickWithIt || ViewCart</title>
</head>

<body>
    <div class="cart__container">
        <?php  

            if(isset($_GET['itemid']))
            {
                $id = $_GET['itemid'];
                unset($_SESSION['itemCart'][$id]);
                unset($_SESSION['cartQty'][$id]);
            }
            if(isset($_SESSION['itemCart']) && !empty($_SESSION['itemCart']))
            {
                echo "<table class='table'>";
                echo "<h2 class='text__center'>Items in Your Cart</h2>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Sr.No.</th>";
                echo "<th>Item Name</th>";
                echo "<th>Item Price</th>";
                echo "<th>Quantity</th>";
                echo "<th>Total</th>";
                echo "<th>Actions</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $i = 0;
                // $grandTotal = array();
                foreach ($_SESSION['itemCart'] as $key => $value) 
                {
                    $i++;
                    $sql = "SELECT * FROM items WHERE item_id='$value'";
                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    $row = mysqli_fetch_assoc($result);
                    
                    $qty = $_SESSION['cartQty'][$key];
                    // $subTotal = $row['item_price'] * $qty;

                    echo "<tr>";
                    echo "<td data-label='Sr.No'>$i</td>";
                    echo "<td data-label='Item Name'>{$row['item_name']}</td>";
                    echo "<td data-label='Item Price'>{$row['item_price']}
                        <input type='hidden' class='itemPrice' value='{$row['item_price']}' /></td>";
                    echo "<td data-label='Quantity'>
                            <form action='cartProcess.php' method='post'>
                                <input class='itemQuantity' name='modifyQuantity' onchange='subTotal();' 
                                    type='number' min='1' max='10' value='$qty'/>
                                <input type='hidden' name='item_name' value='$row[item_name]'>
                            </form>
                        </td>";
                    echo "<td data-label='Sub Total' class='subTotal'></td>";
                    echo "<td><a href='viewCart.php?itemid=$key'>Remove</a></td>";
                    echo "</tr>";        
                }

                echo "</tbody>";
                echo "</table>";
                echo "<p class='total__price'>Your total price is:&nbsp;<span id='grandTotal'></span></p>";
                echo "<div class='buttons'>
                        <a type='button' href='home.php'><span>Buy More Items</span></a>
                        <a type='button' onclick='checkOut();'><span>Checkout</span></a>
                    </div>";
            }
            else
            {
                echo "<p class='emptyCart'>Cart is Empty!</p>";
                echo "<div class='buttons'>
                        <a type='button' href='home.php'><span>Buy Items</span></a>
                        <a type='button' style='cursor: not-allowed;'>
                            <span style='background-color: lightgray;color: green;'>Checkout</span></a>
                    </div>";
            }
            ?>
    </div>

    <?php
        include 'partials/_footer.php';
        ?>


    <script type="text/javascript">
    var grand_Total = 0;
    var itemPrice = document.getElementsByClassName('itemPrice');
    var itemQuantity = document.getElementsByClassName('itemQuantity');
    var itemTotal = document.getElementsByClassName('subTotal');
    var grandTotal = document.getElementById('grandTotal');

    function subTotal() {
        grand_Total = 0;
        for (i = 0; i < itemPrice.length; i++) {
            itemTotal[i].innerText = (itemPrice[i].value) * (itemQuantity[i].value);
            grand_Total = grand_Total + (itemPrice[i].value) * (itemQuantity[i].value);
        }
        grandTotal.innerHTML = grand_Total;
    }
    subTotal();


    function checkOut() {
        alert('Checkout Implemented! Thanks for ordering.');
    }
    </script>
</body>


</html>
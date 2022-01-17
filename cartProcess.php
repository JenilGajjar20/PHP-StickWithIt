<?php
    session_start();

    $itemId = $_GET['itemId'];
    $qty = $_GET['qty'];

    if(isset($_SESSION['itemCart']))
    {
        $currentNumber = $_SESSION['counter'] + 1;
        
        $_SESSION['itemCart'][$currentNumber] = $itemId;
        $_SESSION['cartQty'][$currentNumber] = $qty;

        $_SESSION['counter'] = $currentNumber;
    }
    else
    {
        // If user visits this page for the first time then first array will be created
        // First index will start from 0.
        $itemCart = array();
        $cartQty = array();

        $_SESSION['itemCart'][0] = $itemId;
        $_SESSION['cartQty'][0] = $qty;
        $_SESSION['counter'] = 0;
    }
    header("Location: viewCart.php");

?>
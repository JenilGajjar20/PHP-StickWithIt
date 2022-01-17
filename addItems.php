<!-- This page is used to add the items in the database and display them in the homescreen -->
<!-- This page only is created using Bootstrap CSS -->

<?php
    require 'partials/_dbconnect.php';

    $msg = '';
    if(isset($_POST['submit']))
    {
        $item_name = $_POST['itemName'];
        $item_description = $_POST['itemDescription'];
        $item_price = $_POST['itemPrice'];

        $target_dir = 'image/';
        $target_file = $target_dir.basename($_FILES['itemImage']['name']);
        move_uploaded_file($_FILES['itemImage']['tmp_name'], $target_file);

        $sql = "INSERT INTO items(item_image, item_name, item_description, item_price) 
                VALUES ('$target_file', '$item_name', '$item_description', '$item_price')";
        
        if(mysqli_query($conn, $sql))
        {
            $msg = "Item added to the database successfully";
        }
        else 
        {
            $msg = "Failed!";
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>StickWithIt - AddItems</title>
</head>

<body class="bg-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 rounded mt-5 bg-light">
                <h2 class="text-center p-2">Add Item Information</h2>
                <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                    <div class="form-group">
                        <input type="text" name="itemName" class="form-control" placeholder="Item Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="itemDescription" class="form-control" placeholder="Item Description"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="itemPrice" class="form-control" placeholder="Item Price" required>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <label class="input-group-text custom-file-label" for="customFile">Upload</label>
                            <input type="file" name="itemImage" class="custom-file-input form-control" id="customFile">
                        </div>
                    </div>
                    <div class="form-group"><input type="submit" value="Add" name="submit" class="btn btn-primary">
                    </div>
                    <div class="form-group">
                        <h4 class="text-center"><?= $msg; ?></h4>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3 p-4 bg-light rounded">
                <a href="home.php" class="btn btn-warning d-block btn-lg">Go to Item page</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>
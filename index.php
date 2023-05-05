<?php

include("includes/class-autoload.inc.php");

$products = new ProductView();

$allproducts = $products->showProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product List</title>
    <link rel="stylesheet" href="./css/bootstrap-grid.css" />
    <link rel="stylesheet" href="./css/bootstrap-reboot.css" />
    <link rel="stylesheet" href="./css/bootstrap-utilities.css" />
    <link rel="stylesheet" href="./css/bootstrap.css" />
</head>

<body class="container-fluid">
    <form method="post" action="./includes/deleteproduct.inc.php">
        <header class="d-flex align-items-center justify-content-between mt-1 p-3 mb-5 border border-dark">
            <div>
                <h1 class="text-black-50">Product List</h1>
            </div>
            <div class="d-flex">
                <a class="btn btn-primary mx-2" href="./add-product/">
                    ADD
                </a>
                <input type="submit" name="submit" value="MASS DELETE" class="btn-outline-danger border-0 rounded"
                    id="delete-product-btn" />
            </div>
        </header>

        <section class="container text-center">
            <div class="row">
                <?php
                foreach ($allproducts as $product) {
                    ?>
                <div class="col-sm col-md col-lg card container p-3">
                    <div class="d-flex justify-content-left">
                        <input type="checkbox" class="delete-checkbox" name="<?php echo $product['sn'] ?>" />
                    </div>
                    <h2 class="text-uppercase">
                        <?php echo $product['sku']; ?>
                    </h2>
                    <p>
                        <?php echo $product['name']; ?>
                    </p>
                    <p>
                        <?php echo $product['price']; ?>$
                    </p>
                    <p>
                        <?php echo $product['details']; ?>
                    </p>
                </div>
                <?php
                }
?>
            </div>
        </section>
    </form>
</body>

</html>
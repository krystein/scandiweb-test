<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Add</title>
    <link rel="stylesheet" href="../css/bootstrap-grid.css" />
    <link rel="stylesheet" href="../css/bootstrap-reboot.css" />
    <link rel="stylesheet" href="../css/bootstrap-utilities.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
</head>

<body class="container-fluid">
    <form method="post" action="../includes/addproduct.inc.php" id="product_form">
        <header class="d-flex align-items-center justify-content-between mt-1 p-3 mb-5 border border-dark">
            <h1 class="text-black-50">Product Add</h1>

            <div class="d-flex">
                <input type="submit" name="save" class="btn-outline-success rounded border-success" id="save"
                    value="Save" />
                <a class="btn btn-primary mx-2" href="../">
                    CANCEL
                </a>
            </div>
        </header>

        <section class="container d-flex justify-content-center w-100">
            <div class="align-items-center border-dark">
                <p id="error" class="bg-danger">
                    <?php
                    if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    }
                    ?>
                </p>

                <div class="form-group row">
                    <label class="col-sm col-form-label">SKU: </label>
                    <div>
                        <input type="text" name="sku" id="sku" class="input form-control" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm col-form-label">Name</label>
                    <div>
                        <input type="text" name="name" id="name" class="input form-control" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm col-form-label">Price ($)</label>
                    <div>
                        <input type="text" name="price" id="price" class="input form-control" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col col-form-label">Type Switcher</label>
                    <div>
                        <select id="productType" name="productType" class="input form-control" required
                            onchange="changeSwitcher()">
                            <option selected disabled value="">Select Type</option>
                            <option>DVD</option>
                            <option>Book</option>
                            <option>Furniture</option>
                        </select>
                    </div>
                </div>
                <div id="switcher"></div>
            </div>
        </section>
    </form>
</body>
<script src="../js/app.js"></script>


</html>
<?php

if (isset($_POST['submit'])) {
    require_once("class-autoload.inc.php");

    $product = new ProductControl("", "", "", "", "");

    $product->removeProduct($_POST);

    header("location: ../");
} else {
    header("location: ../index.php?error=invalid!");
}

<?php

class Product extends Dbh
{
    protected function getProducts()
    {
        return $this->connect()->query("SELECT * FROM  products");
    }
    protected function delete($sku)
    {
        $stmt = $this->connect()->prepare("DELETE FROM products WHERE sku = ?;");

        if (!$stmt->execute(array($sku))) {
            $stmt = null;
            header("location: ../index.php?error=stmt an Error occured!");
            exit();
        }

        $stmt = null;
        echo "Products deleted successfully..";
    }
    protected function add($sku, $name, $price, $type, $details)
    {
        $stmt = $this->connect()->prepare("INSERT INTO products (sku, name, price, type, details) VALUES (?, ?, ?, ?, ?);");

        if (!$stmt->execute(array($sku, $name, $price, $type, $details))) {
            $stmt = null;
            header("location: ../index.php?error=stmt failed!");
            exit();
        } else {
            $stmt = null;
            echo "Product added successfully..";
        }
    }
    protected function checkSku($sku)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE sku = ?;");

        if (!$stmt->execute(array($sku))) {
            $stmt = null;
            header("location: ../index.php?error=stmt failed!");
            exit();
        }

        $result = false;
        if ($stmt->rowCount() > 0) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    public function validateSku($sku)
    {
        $result = false;
        if (!$this->checkSku($sku)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

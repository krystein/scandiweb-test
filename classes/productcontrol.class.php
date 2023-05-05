<?php

class ProductControl extends Product
{
    private $sku;
    private $name;
    private $price;
    private $type;
    private $details;

    public function __construct($sku, $name, $price, $type, $details)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
        $this->details = $details;
    }

    public function addProduct()
    {
        if ($this->validate() == false) {
            header("location: ../add-product/?error=invalid parameters!");
            exit();
        }

        $this->add($this->sku, $this->name, $this->price, $this->type, $this->details);
    }
    public function removeProduct($inputArray)
    {
        foreach ($inputArray as $key => $val) {
            $sn = "";
            if ($key !== "submit") {
                $sn = $key;
            } else {
                continue;
            }
            $this->delete($sn);
        }
    }
    private function validate()
    {
        $result = false;
        if (empty($this->sku) || empty($this->name) || empty($this->price) || empty($this->type) || empty($this->details)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }



}
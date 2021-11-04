<?php
class DVD extends Product{


    public $size;


    public function __construct($sku, $name, $price, $size)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->sku = $price;
        $this->size = $size;
    }

    public function save(array $prodoct_details):bool{
        return true;    
    }
    public function getAll():array{
        return [];
    }
   



}

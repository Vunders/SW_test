<?php
class Furniture extends Product{


public $width;
public $lenght;
public $height;

public function save(array $prodoct_details):bool{
    return true;    
}
public function getAll():array{
    return [];
}
}
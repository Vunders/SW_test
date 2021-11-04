<?php
class Book extends Product{

    public function save(array $prodoct_details):bool{
        return true;    
    }
    public function getAll():array{
        return [];
    }

}
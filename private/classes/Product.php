<?php
abstract class Product{

//kur pēctam inicializējam child klases? index.php? template? varbūt pašā API?
//kādas funkcijas/metodes sevī jāietver Klasēs?
//kā padot no API, vai JS info par mainīgajiem?

//vai kaut kur kodā ir jānorada, kas ir CM, KG, MB?

    abstract public function getAll():array;
   
    abstract public function save(array $prodoct_details):bool;
   
    public function delete(int $id):bool{
        return true;
    }

}
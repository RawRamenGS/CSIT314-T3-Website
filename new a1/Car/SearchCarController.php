<?php 
require_once("SearchCarEntity.php");


class SearchCarController{
    public function SearchCar($carname,$perPage,$offset){
        $carEntity = new SearchCarEntity();
        return $carEntity->SearchCar($carname,$perPage,$offset);
    }

    public function getTotalCar($carname){
        $carEntity = new SearchCarEntity();
        return $carEntity->getTotalCar($carname);
    }
}



?>
<?php

    require_once('FavEntity.php');

    class FavController{
        public function getfavCar(){
            $favEntity = new FavEntity();
            return $favEntity->getfavCar();
        }
    }



?>
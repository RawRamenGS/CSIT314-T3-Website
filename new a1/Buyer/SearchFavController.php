<?php
    require_once('SearchFavEntity.php');

    class SearchFavController{
        public function searchFav($search){
            $entity = new SearchFavEntity();
            return $entity->searchFav($search);
        }
    }

?>
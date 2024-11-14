<?php

require_once('RemoveEntity.php');

class RemoveController{
    public function Remove($favId){
        $favEntity = new RemoveEntity();
        return $favEntity->Remove($favId);
    }
}


?>
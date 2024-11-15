<?php
 require_once('../connect.php');

 class ViewBuyerFavListingEntity{
    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function getfavcar(){
        $stmt = $this->conn->prepare("SELECT favourites.id, carlisting.carName, carlisting.dateListed, carlisting.price, 
                                        carlisting.description, useraccount.username FROM favourites
                                        INNER JOIN carlisting ON carlisting.carID = favourites.carID
                                        INNER JOIN useraccount ON useraccount.id = carlisting.Agent
                                        WHERE favourites.favouriteBy = ?");
        $stmt->bind_param('i',$_SESSION['id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows>0){
            $fav = $result->fetch_All(MYSQLI_ASSOC);
            return $fav;
        }else{
            return "No shorlisted yet";
        }


    
    }
 }


?>
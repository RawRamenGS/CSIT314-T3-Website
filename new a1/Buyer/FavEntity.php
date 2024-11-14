<?php
 require_once('../connect.php');

 class FavEntity{
    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function getfavcar(){
        $stmt = $this->conn->prepare("SELECT favourites.id, carlisting.carName, carlisting.dateListed, carlisting.price, 
                                        carlisting.description, useraccount.username FROM favourites
                                        JOIN carlisting ON carlisting.carID = favourites.carID
                                        JOIN useraccount ON useraccount.id = 3
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
<?php

require_once('RemoveController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $favId = trim($_POST['favId']);
    
    $controller = new RemoveController();
    $result = $controller->Remove($favId);

    if ($result == true){
        echo "<script>alert('Remove Successful!'); window.location.href='ViewBuyerFavListingUI.php';</script>";
    }else{
        echo "<script>alert('$result'); window.location.href='ViewBuyerFavListingUI.php';</script>";
    }
}
?>





?>
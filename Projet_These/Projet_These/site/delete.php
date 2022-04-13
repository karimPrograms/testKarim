<?php
include '../login/config.php'; 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

if (isset($_GET['id'])) {  
    $id = $_GET['id'];  
    $query = "DELETE FROM `medicament` WHERE Med_Id = '$id'";  
    $run = mysqli_query($mysqli,$query);  
    if ($run) {  
         header('location:MainPage.php');  
    }else{  
         echo "Error: ".mysqli_error($conn);  
    }  
}  

?>
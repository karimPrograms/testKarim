<?php

include '../login/config.php'; 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

if(isset($_POST['updatedata'])){

    $id = $_POST['update_idn'];
    $type = $_POST['typeD'];
    $nom = $_POST['NomD'];
    $milli = $_POST['MilligrammeD'];
    $prix = $_POST['PrixD'];
    $dispo = $_POST['DispoD'];

        $query = "UPDATE medicament SET Type='$type', Nom='$nom', Miligramme='$milli', Prix='$prix', Disponible='$dispo' WHERE Med_Id='$id'  ";
        $query_run = mysqli_query($mysqli, $query);

        if($query_run)
        {
            header("Location:MainPage.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }

}

?>

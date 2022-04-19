<?php

include '../login/config.php'; 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

if(isset($_POST['EditInfo'])){

    $id = $_SESSION['username'];
    $pharmName = $_POST['pharmName'];
    $pharmNum1 = $_POST['pharmNum1'];
    $pharmNum2 = $_POST['pharmNum2'];
    $pharmAdr = $_POST['pharmAdr'];
    $pharmEmail = $_POST['pharmEmail'];

    if ($pharmNum2 == ""){
        $pharmNum2 = 0;
    }

        $query = "UPDATE pharma_info SET Name='$pharmName', Contact_Number1	='$pharmNum1', Contact_Number2='$pharmNum2', Location='$pharmAdr', Email='$pharmEmail' WHERE Id='$id'";
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

<?php
include "connection.php";
$no = $_GET['no'];
$delete = $conn->query("DELETE FROM car_detail WHERE no = '$no'");
if(!$delete){
    echo $conn->error;
}
else{
    header("Location: viewCarAdmin.php");
}
?>

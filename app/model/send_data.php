<?php

$con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");

$select = "SELECT `trial_number` FROM `state`";

$trial = mysqli_query($con, $select);
$p = $trial->fetch_assoc();
$trial = $p["trial_number"]; 

$dataname = $_POST['data']; 
$currenttime = $_POST['time']; 


if(strcmp($dataname, "T1") == 0)
{
    $update_new_row = "UPDATE `raw_data` SET `T1`= '$currenttime'  ORDER BY date DESC LIMIT 1"; 
    mysqli_query($con, $update_new_row);
} 
elseif (strcmp($dataname, "T2") == 0)
{
    $update_new_row = "UPDATE `raw_data` SET `T2`= '$currenttime'   ORDER BY date DESC LIMIT 1"; 
    mysqli_query($con, $update_new_row);
} 
elseif (strcmp($dataname, "T3") == 0)
{
    $update_new_row = "UPDATE `raw_data` SET `T3`= '$currenttime'   ORDER BY date DESC LIMIT 1"; 
    mysqli_query($con, $update_new_row);
} 
elseif (strcmp($dataname, "T4") == 0)
{
    $update_new_row = "UPDATE `raw_data` SET `T4`= '$currenttime'   ORDER BY date DESC LIMIT 1"; 
    mysqli_query($con, $update_new_row);
} 


?>
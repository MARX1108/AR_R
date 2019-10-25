<?php

$con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");

$select = "SELECT `trial_number` FROM `state`";

$trial = mysqli_query($con, $select);
$p = $trial->fetch_assoc();
$trial = $p["trial_number"]; 

$dataname = $_POST['data']; 

// echo $result; 

// if ($dataname == 'date')
// {
//     $update_new_row = "UPDATE `raw_data` SET `date`= CURRENT_TIMESTAMP ORDER BY date DESC LIMIT 1"; 
//     mysqli_query($con, $update_new_row);
// } 

if(strcmp($dataname, "T1") == 0)
{
    $update_new_row = "UPDATE `raw_data` SET `T1`= CURRENT_TIMESTAMP  ORDER BY date DESC LIMIT 1"; 
    mysqli_query($con, $update_new_row);
} 
elseif (strcmp($dataname, "T2") == 0)
{
    $update_new_row = "UPDATE `raw_data` SET `T2`= CURRENT_TIMESTAMP  ORDER BY date DESC LIMIT 1"; 
    mysqli_query($con, $update_new_row);
} 
elseif (strcmp($dataname, "T3") == 0)
{
    $update_new_row = "UPDATE `raw_data` SET `T3`= CURRENT_TIMESTAMP  ORDER BY date DESC LIMIT 1"; 
    mysqli_query($con, $update_new_row);
} 
elseif (strcmp($dataname, "T4") == 0)
{
    $update_new_row = "UPDATE `raw_data` SET `T4`= CURRENT_TIMESTAMP  ORDER BY date DESC LIMIT 1"; 
    mysqli_query($con, $update_new_row);
} 


?>
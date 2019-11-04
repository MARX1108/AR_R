<?php

$con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");

$select = "SELECT `trial_number` FROM `state`";

$result = mysqli_query($con, $select);
$p = $result->fetch_assoc();
$result = $p["trial_number"]; 

if($result != -1)
{
    $result = $result + 1;
    $insert_new_row = "INSERT INTO `raw_data`(`trial_number`) VALUES ($result)";
    mysqli_query($con, $insert_new_row);
    


    $query = "SELECT * FROM `experiment_info` ORDER BY date DESC LIMIT 1";

    $q = mysqli_query($con, $query);
    $array = $q->fetch_assoc();

    $experiment_id = $array["experiment_id"];
    $session_id = $array["session_id"];
    $pointer_ID = $array["pointer_id"];
    $observer_ID = $array["observer_id"];
    $virtual_type = $array["virtual_type"];
    $spatial_type = $array["spatial_type"];
    $rehearsal = $array["rehearsal"];

    
    $update_new_row = "UPDATE `raw_data` SET `pointer_ID`= '$pointer_ID' ORDER BY date DESC LIMIT 1;";
    mysqli_query($con, $update_new_row);
    $update_new_row = "UPDATE `raw_data` SET `experiment_id`= '$experiment_id' ORDER BY date DESC LIMIT 1;";
    mysqli_query($con, $update_new_row);
    $update_new_row = "UPDATE `raw_data` SET `observer_ID`= '$observer_ID' ORDER BY date DESC LIMIT 1;";
    mysqli_query($con, $update_new_row);
    $update_new_row = "UPDATE `raw_data` SET `virtual_type`= '$virtual_type' ORDER BY date DESC LIMIT 1;";
    mysqli_query($con, $update_new_row);
    $update_new_row = "UPDATE `raw_data` SET `spatial_type`= '$spatial_type' ORDER BY date DESC LIMIT 1;";
    mysqli_query($con, $update_new_row);
    $update_new_row = "UPDATE `raw_data` SET `rehearsal`= '$rehearsal' ORDER BY date DESC LIMIT 1;";
    mysqli_query($con, $update_new_row);
    $update_new_row = "UPDATE `raw_data` SET `session_id`= '$session_id' ORDER BY date DESC LIMIT 1;";
    mysqli_query($con, $update_new_row);

}



$update="UPDATE `state` SET `trial_number`= '$result' " ; 
mysqli_query($con, $update);

echo json_encode(array("trial_number" => $result,
"experiment_id" => $experiment_id,
"pointer_ID" => $pointer_ID,
"observer_ID" => $observer_ID,
"virtual_type" => $virtual_type,
"spatial_type" => $spatial_type,
"rehearsal" => $rehearsal
));
?>
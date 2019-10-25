<?php

$con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");

$select = "SELECT `trial_number` FROM `state`";

$result = mysqli_query($con, $select);
$p = $result->fetch_assoc();
$result = $p["trial_number"]; 

// $dataname = $_POST['data']; 


// if ($dataname == 'T1')
// {
//     $update_new_row = "
//     UPDATE 'raw_data'
//     SET 'T1' = 'CURRENT_TIMESTAMP()'
//     WHERE 'trial_number' = '$result'"; 

//     mysqli_query($con, $update_new_row);
// }

if($result != -1)
{
    $result = $result + 1;
    $insert_new_row = "INSERT INTO `raw_data`(`trial_number`) VALUES ($result)";
    // $insert_new_row = "INSERT INTO `raw_data`(`trial_number`, `subject_1_name`, `subject_2_name`, `virtual_type`, `spatial_type`, `rehearsal`, `date`, `T1`, `T2`, `T3`, `T4`) VALUES ($result,)"; 
    mysqli_query($con, $insert_new_row);
    $update_new_row = "UPDATE `raw_data` SET `date`= CURRENT_TIMESTAMP ORDER BY date DESC LIMIT 1"; 
    mysqli_query($con, $update);
}
$update="UPDATE `state` SET `trial_number`= '$result' " ; 
mysqli_query($con, $update);






echo json_encode(array("trial_number" => $result));








?>
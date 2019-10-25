<?php

include_once("content.php");

$view = $_POST['view'];
$state_number = $_POST['state_number'];

$con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
$trial_number = "SELECT `trial_number` FROM `state`";

$result = mysqli_query($con, $trial_number);
$t = $result->fetch_assoc();
$trial_number = $t["trial_number"]; 

if (strcmp($view, "pointer") == 0)
{
    pstate($state_number);
    $content = p_view( $state_number);
}
else
{
    ostate($state_number);
    $content = o_view($state_number);
}

echo json_encode(
    array("state" => $state_number, "content" => $content, "trial_number" => $trial_number)
);

// echo json_encode(array("a" => "valueA", "b" => "valueB"));


function pstate($newvalue)
{

    $select = "SELECT `p_state` FROM `state`";
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    
    $update="UPDATE `state` SET `p_state`= '$newvalue' " ; 
    $updating = mysqli_query($con, $update);

    return $newvalue;
}


function ostate($newvalue)
{
    
    $select = "SELECT `p_state` FROM `state`";
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    
    $update="UPDATE `state` SET `o_state`= '$newvalue' " ; 
    $updating = mysqli_query($con, $update);

    return $newvalue;
}

function lock()
{
    $select = "SELECT `p_state` FROM `state`";
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    
    $result = mysqli_query($con, $select);
    while ($row = $result->fetch_assoc()) {
        $db_p_step = $row["p_state"]; 
    }
    $newvalue = 1;
    if($db_p_step < 2)
    {
        $newvalue = 0;
    }
    return $newvalue;
}



?>
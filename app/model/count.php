<?php

include_once("content.php");

$view = $_POST['state'];


if (strcmp($view, "pointer") == 0)
{
    $newvalue = pstate();
    $content = p_view( $newvalue);
}
else
{
    $newvalue = ostate();
    $content = o_view( $newvalue);
}

echo json_encode(
    array("state" => $newvalue, "content" => $content)
);

// echo json_encode(array("a" => "valueA", "b" => "valueB"));







function pstate()
{

    $select = "SELECT `p_state` FROM `state`";
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    
    $result = mysqli_query($con, $select);
    while ($row = $result->fetch_assoc()) {
        $db_p_step = $row["p_state"]; 
    }

    $newvalue = $db_p_step + 1; 
    if ($newvalue > 4)
    {
        $newvalue = 1;
    }

    $update="UPDATE `state` SET `p_state`= '$newvalue' " ; 
    $updating = mysqli_query($con, $update);

    return $newvalue;
}


function ostate()
{
    $select = "SELECT `o_state` FROM `state`";
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    
    $result = mysqli_query($con, $select);
    while ($row = $result->fetch_assoc()) {
        $db_p_step = $row["o_state"]; 
    }

    $newvalue = $db_p_step+1; 
    if ($newvalue > 4)
    {
        $newvalue = 1;
    }

    
    $lock = lock();
    if ($lock == 0)
    {
        $newvalue = 1;
    }
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
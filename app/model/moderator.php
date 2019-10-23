<?php


$command = $_POST[command];
if(isset($command))
{
    if (strcmp($command, "start") == 0)
    {
        start_all();
        // echo("reset");
    }
    else if(strcmp($command, "reset") == 0)
    {
        reset_all();
        // echo("not reset");
    }
}


function start_all()
{
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    
    $update="UPDATE `state` SET `p_state`= '0' " ; 
    mysqli_query($con, $update);
    $update="UPDATE `state` SET `o_state`= '0' " ; 
    mysqli_query($con, $update);
    $update="UPDATE `state` SET `trial_number`= '0' " ; 
    mysqli_query($con, $update);
}


function reset_all()
{
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    
    $update="UPDATE `state` SET `p_state`= '0' " ; 
    mysqli_query($con, $update);
    $update="UPDATE `state` SET `o_state`= '0' " ; 
    mysqli_query($con, $update);
    $update="UPDATE `state` SET `trial_number`= '-1' " ; 
    mysqli_query($con, $update);
}



?>
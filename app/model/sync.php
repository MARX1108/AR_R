<?php
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    $pselect = "SELECT `p_state` FROM `state`";
    $oselect = "SELECT `o_state` FROM `state`";
    $trial_number = "SELECT `trial_number` FROM `state`";

    $presult = mysqli_query($con, $pselect);
    $p = $presult->fetch_assoc();
    $presult = $p["p_state"]; 

    $oresult = mysqli_query($con, $oselect);
    $o = $oresult->fetch_assoc();
    $oresult = $o["o_state"]; 

    $result = mysqli_query($con, $trial_number);
    $t = $result->fetch_assoc();
    $result = $t["trial_number"]; 

    echo json_encode(array("pstate" => $presult, "ostate" => $oresult, "trial_number" => $result));
?>

<?php
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    $pselect = "SELECT `p_state` FROM `state`";
    $oselect = "SELECT `o_state` FROM `state`";

    $presult = mysqli_query($con, $pselect);
    $p = $presult->fetch_assoc();
    $presult = $p["p_state"]; 

    $oresult = mysqli_query($con, $oselect);
    $o = $oresult->fetch_assoc();
    $oresult = $o["o_state"]; 
    $input = $_POST['instruction'];

    echo json_encode(array("pstate" => $presult, "ostate" => $oresult));
?>

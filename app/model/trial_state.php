<?php

$trial_state = $_POST['trial_state'];
$con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
$update="UPDATE `state` SET `trial_state`= '$trial_state' " ; 
$updating = mysqli_query($con, $update);


echo json_encode(
    array("trial_state" => $trial_state)
);

?>
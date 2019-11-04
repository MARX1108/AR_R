<?php 
include("../controller/include/connection.php");
include("../model/moderator.php");

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    if (is_bool($data))
    {
        $output = $data ? 'true' : 'false';
    }

    echo "<script>console.log('" . $output . "' );</script>";

}

    if(isset($_POST['sign_up']))
    {
        $pointer_id = htmlentities(mysqli_real_escape_string($con, $_POST['pointer_id']));
        $observer_id = htmlentities(mysqli_real_escape_string($con, $_POST['observer_id']));

        $virtual_type = htmlentities(mysqli_real_escape_string($con, $_POST['virtual_type']));
        $spatial_type = htmlentities(mysqli_real_escape_string($con, $_POST['spatial_type']));


        $experiment_id = htmlentities(mysqli_real_escape_string($con, (int)$_POST['experiment_id']));
        $session_id = htmlentities(mysqli_real_escape_string($con, (int)$_POST['session_id']));


        if (empty($_POST['rehearsal']))
        {
            $temp = "off";
        }
        else
        {
            $temp = "on";
        }
        $rehearsal = htmlentities(mysqli_real_escape_string($con, $temp));


        $temp = date("M,d,Y h:i:s");
        // printf("error messages %s\n", $temp);
        $date = htmlentities(mysqli_real_escape_string($con, $temp)); 
        // $rand = rand(1,2);


        if($pointer_id == '' || $observer_id == '') 
        {
            echo "<script>alert('pointer or observer id missing')</script>";
        }

        $insert = "insert into experiment_info (pointer_id, observer_id, virtual_type, spatial_type, rehearsal, session_id, experiment_id) 
        values('$pointer_id', '$observer_id', '$virtual_type', '$spatial_type', '$rehearsal', '$session_id', '$experiment_id')";

        $query = mysqli_query($con, $insert);
        debug_to_console($query);
        start_all();

        if ($query)
        {
            echo "<script>alert('submit successful)</script>";
            echo "<script>window.open('../controller/ModeratorController.php', '_self')</script>";
        }
        else
        {
            echo "<script>alert('setup unsuccessful, try again!')</script>";
        }
    }


    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    $update="UPDATE `state` SET `trial_state`= '1' " ; 
    $updating = mysqli_query($con, $update);


?>
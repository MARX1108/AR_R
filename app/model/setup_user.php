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


        // $t = mysqli_real_escape_string($con, $_POST['rehearsal']);
        // printf("error messages %s\n", $t);
        // $rehearsal = htmlentities(mysqli_real_escape_string($con, $_POST['subject_1_name']));
        $temp = date("M,d,Y h:i:s");
        // printf("error messages %s\n", $temp);
        $date = htmlentities(mysqli_real_escape_string($con, $temp)); 
        // $rand = rand(1,2);
        // debug_to_console("data in subject_1_name: $subject_1_name ;");
        // debug_to_console("data in subject_2_name: $subject_2_name ;");
        // debug_to_console("data in virtual_type: $virtual_type ;");
        // debug_to_console("data in spatial_type: $spatial_type ;");
        // debug_to_console("data in rehearsal: $rehearsal ;");

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

?>
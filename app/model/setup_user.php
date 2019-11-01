<?php 
include("../controller/include/connection.php");

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
        $subject_1_name = htmlentities(mysqli_real_escape_string($con, $_POST['subject_1_name']));
        $subject_2_name = htmlentities(mysqli_real_escape_string($con, $_POST['subject_2_name']));

        $virtual_type = htmlentities(mysqli_real_escape_string($con, $_POST['virtual_type']));
        $spatial_type = htmlentities(mysqli_real_escape_string($con, $_POST['spatial_type']));


        $experiment_ID = htmlentities(mysqli_real_escape_string($con, (int)$_POST['experiment_ID']));
        $testing_number_set = htmlentities(mysqli_real_escape_string($con, (int)$_POST['testing_number_set']));


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

        if($subject_1_name == '' || $subject_2_name == '') 
        {
            echo "<script>alert('pointer or observer id missing')</script>";
        }

        $insert = "insert into raw_data (pointer_ID, observer_ID, virtual_type, spatial_type, rehearsal, testing_number_set, experiment_id) 
        values('$subject_1_name', '$subject_2_name', '$virtual_type', '$spatial_type', '$rehearsal', '$testing_number_set', '$experiment_ID')";

        $query = mysqli_query($con, $insert);
        debug_to_console($query);
     

        if ($query)
        {
            echo "<script>alert('submit successful)</script>";
            echo "<script>window.open('../controller/ModeratorController.php', '_self')</script>";
        }
        else
        {
            // printf("Error message: %s\n", mysqli_error($con));
            // debug_to_console("error messages: " + mysqli_error( $con ));
            echo "<script>alert('setup unsuccessful, try again!')</script>";
            printf("Error message: %s\n", mysqli_error($con));
        }
    }

?>
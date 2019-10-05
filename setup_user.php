<?php 
include("include/connection.php");

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


        if (empty($_POST['rehearsal']))
        {
            $temp = "off";
            $rehearsal = htmlentities(mysqli_real_escape_string($con, $temp));
        }
        else
        {
            $rehearsal = htmlentities(mysqli_real_escape_string($con, $_POST['rehearsal']));
        }


        // $t = mysqli_real_escape_string($con, $_POST['rehearsal']);
        // printf("error messages %s\n", $t);
        // $rehearsal = htmlentities(mysqli_real_escape_string($con, $_POST['subject_1_name']));
        $temp = date("M,d,Y h:i:s");
        // printf("error messages %s\n", $temp);
        $date = htmlentities(mysqli_real_escape_string($con, $temp)); 
        // $rand = rand(1,2);
        debug_to_console("data in subject_1_name: $subject_1_name ;");
        debug_to_console("data in subject_2_name: $subject_2_name ;");
        debug_to_console("data in virtual_type: $virtual_type ;");
        debug_to_console("data in spatial_type: $spatial_type ;");
        debug_to_console("data in rehearsal: $rehearsal ;");

        if($subject_1_name == '' || $subject_2_name == '') 
        {
            echo "<script>alert('subject one name missing')</script>";
        }

        // $insert = "insert into raw_data (subject_1_name, subject_2_name, virtual_type, spatial_type, rehearsal, date ) values('$subject_1_name', '$subject_2_name', '$virtual_type', '$spatial_type', '$rehearsal', '$date' )";
        $insert = "insert into raw_data (subject_1_name, subject_2_name, virtual_type, spatial_type, rehearsal ) values('$subject_1_name', '$subject_2_name', '$virtual_type', '$spatial_type', '$rehearsal')";

        $query = mysqli_query($con, $insert);
        debug_to_console($query);
     

        if ($query)
        {
            echo "<script>alert('submit successful)</script>";
            echo "<script>window.open('moderator_view_control.php', '_self')</script>";
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
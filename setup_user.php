<?php 
include("include/connection.php");

    if(isset($_POST['sign_up']))
    {
        $subject_1_name = htmlentities(mysqli_real_escape_string($con, $_POST['subject_1_name']));
        $subject_2_name = htmlentities(mysqli_real_escape_string($con, $_POST['subject_2_name']));

        $virtual_type = htmlentities(mysqli_real_escape_string($con, $_POST['virtual_type']));
        $spatial_type = htmlentities(mysqli_real_escape_string($con, $_POST['spatial_type']));
        $rehearsal = htmlentities(mysqli_real_escape_string($con, $_POST['rehearsal']));
        // $rand = rand(1,2);

        if($subject_1_name = ' ' || $subject_2_name = ' ') 
        {
            echo "<script>alert('subject one name missing')</script>";
        }

        $insert = "insert into raw_data (subject_1_name, subject_2_name, virtual_type, spatial_type, rehearsal ) values('$subject_1_name', '$subject_2_name', '$virtual_type', '$spatial_type', '$rehearsal' )";
        $query = mysqli_query($con, $insert);

        if ($query)
        {
            echo "<script>alert('submit successful)</script>";
            echo "<script>window.open('moderator_view_control.php', '_self')</script>";
        }
        else
        {
            echo "<script>alert('setup unsuccessful, try again!')</script>";
            echo "<script>window.open('setup.php', '_self')</script>";
        }
    }

?>
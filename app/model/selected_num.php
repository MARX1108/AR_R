<?php


$number = $_POST['selected_num'];

$con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
$update_new_row = "UPDATE `raw_data` SET `identified_number`= '$number'  ORDER BY date DESC LIMIT 1"; 
mysqli_query($con, $update_new_row);

echo"number confirm";



?>
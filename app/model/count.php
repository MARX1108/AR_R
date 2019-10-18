<?php
if (isset($_POST['state']))
{
    $input = $_POST['state'];
    // echo "stupid joanna!";
    if (strcmp($input, "pointer") == 0)
    {
        $newvalue = pstate();
    }
    else
    {
        $newvalue = ostate();
    }

    echo $newvalue;
}

if (isset($_POST['view']))
{
    if(strcmp($input, "pointer") == 0)
    {
        p_view();
    }
    else
    {
        o_view();
    }
}



function p_view()
{
    echo "test\n";
}

function o_view()
{
    
    if ($_SESSION["O_state"] == 0)
    {
        echo "<p> Please wait for instructions! <p>";

    }
    else if ($_SESSION["O_state"] == 1)
    {
        echo "<p> Click ENTER when you have made your choice <p>";
    }
    else if ($_SESSION["O_state"] == 4)
    {
        echo "<p> Round 1 Finished<p> "; 

        $_SESSION["O_state"] = 0; 
        $_SESSION["P_state"] = 0; 
        $_SESSION['trial_count'] = $_SESSION['trial_count']+1;
        $_SESSION['trial_state'] = 0;
    }
    else if ($_SESSION["O_state"] == 2)
    {   
        echo "<div id = 'btn'>";
        echo "
            <button id = 'btn_number'>#1</button>
            <button id = 'btn_number'>#2</button>
            <button id = 'btn_number'>#3</button>
        "; 
        echo "<br>"; 
        echo "
            <button id = 'btn_number'>#4</button>
            <button id = 'btn_number'>#5</button>
            <button id = 'btn_number'>#6</button>
        "; 
        echo "<br>"; 
        echo "
            <button id = 'btn_number'>#7</button>
            <button id = 'btn_number'>#8</button>
            <button id = 'btn_number'>#9</button>
        "; 
        echo "</div>";
    }

?>
</p>

<p id = "state_three_question">
    <?php
    if ($_SESSION["O_state"] == 3)
    { 
        echo "<p> How confident are you about your selection? <p> "; 
    }
    ?>
</p>

<p id = "state_three">
    <?php
    if ($_SESSION["O_state"] == 3)
    {
        echo "
        <label class='container'>
            <input type='checkbox'>
            <span class='checkmark'></span>
        </label>

        <label class='container'>
            <input type='checkbox'>
            <span class='checkmark'></span>
        </label>

        <label class='container'>
            <input type='checkbox'>
            <span class='checkmark'></span>
        </label>

        <label class='container'>
            <input type='checkbox'>
            <span class='checkmark'></span>
        </label>

        <label class='container'>
            <input type='checkbox'>
            <span class='checkmark'></span>
        </label>

        <label class='container'>
            <input type='checkbox'>
            <span class='checkmark'></span>
        </label>

        <label class='container'>
            <input type='checkbox'>
            <span class='checkmark'></span>
        </label>
        "; 
    }
}


function pstate()
{
    $select = "SELECT `p_state` FROM `state`";
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    
    $result = mysqli_query($con, $select);
    while ($row = $result->fetch_assoc()) {
        $db_p_step = $row["p_state"]; 
    }

    $newvalue = $db_p_step+1; 
    if ($newvalue > 2)
    {
        $newvalue = 0;
    }

    $update="UPDATE `state` SET `p_state`= '$newvalue' " ; 
    $updating = mysqli_query($con, $update);

    return $newvalue;
}


function ostate()
{
    $select = "SELECT `o_state` FROM `state`";
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    
    $result = mysqli_query($con, $select);
    while ($row = $result->fetch_assoc()) {
        $db_p_step = $row["o_state"]; 
    }

    $newvalue = $db_p_step+1; 
    if ($newvalue > 4)
    {
        $newvalue = 0;
    }

    $update="UPDATE `state` SET `o_state`= '$newvalue' " ; 
    $updating = mysqli_query($con, $update);
    $lock = lock();
    if ($lock == -1)
    {
        $newvalue = -1;
    }
    return $newvalue;
}

function lock()
{
    $select = "SELECT `p_state` FROM `state`";
    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    
    $result = mysqli_query($con, $select);
    while ($row = $result->fetch_assoc()) {
        $db_p_step = $row["p_state"]; 
    }
    $newvalue = 0;
    if($db_p_step < 2)
    {
        $newvalue = -1;
        // $update="UPDATE `state` SET `o_state`= '$newvalue' " ; 
        // mysqli_query($con, $update);
    }
    return $newvalue;
}



?>
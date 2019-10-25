<?php




function p_view($state)
{

    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
    $trial_number = "SELECT `trial_number` FROM `state`";
    $result = mysqli_query($con, $trial_number);
    $t = $result->fetch_assoc();
    $result = $t["trial_number"]; 

    $test_number = "SELECT `Set_2` FROM `test_number` WHERE trial_number = '$result'";
    $result = mysqli_query($con, $test_number);
    $t = $result->fetch_assoc();
    $result = $t["Set_2"]; 

    if ($state == 0)
    {
        return "<p id = 'main'> When instructed to do so </br> Press ENTER to start</p>";
    }
    else if ($state == 1)
    {
        return "<p id = 'main'> 5 seconds count down </br> The number will show up in <span id='time'>5</span> seconds...</p>";
    }
    else if ($state == 2)
    {
        return "<p id = 'main'> #$result</br> Press the key when you finish pointing</p>";
    }
    else if ($state == 3)
    {
        return "<p id = 'main'> Please hold your hands </p>";
    }
    else
    {
        return "<p id = 'main'> Please pull back your hands </br> Current trial finished </p>";
    }

}

function o_view($state)
{
    if ($state == 0)
    {
        return "<p id = 'main'> When instructed to do so </br> Press ENTER to start</p>";
    }
    else if ($state == 1)
    {
        return "<p> Look at the table 
        </br> See which number is the cube that the pointer is pointing at
        </br> Click ENTER when you have made your choice
        <p>";
    }
    else if ($state == 2)
    {
        return "<div id = 'btn'>
            <button id = 'btn_number'>#1</button>
            <button id = 'btn_number'>#2</button>
            <button id = 'btn_number'>#3</button>
            <br>
            <button id = 'btn_number'>#4</button>
            <button id = 'btn_number'>#5</button>
            <button id = 'btn_number'>#6</button>
            <br>
            <button id = 'btn_number'>#7</button>
            <button id = 'btn_number'>#8</button>
            <button id = 'btn_number'>#9</button>
            </div>"; 
    }
    else if ($state == 3)
    {
        return "
        <p id = 'state_three_question'>
        <p> How confident are you about your selection? <p>
        </p>
        <p id = 'state_three'>

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
            </p>
        ";

    }
    else 
    {
        return 
        "<p> Current Round Finished. </br>
        Starting next round in <span id='time'>5</span> seconds </p>";
    }
}
?>
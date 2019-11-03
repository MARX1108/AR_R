<?php

if(isset($_POST['fetchContent']))
{
    $state = $_POST['state'];
    if($_POST['clientView'] == "pointer")
    {
        $content =  p_view($state);
    }
    else
    {
        $content =  o_view($state);
    }

    echo json_encode(array("content" => $content));
}

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
        return "<p id = 'main'> When you are ready to start</br> press ENTER</p>";
    }
    else if ($state == 1)
    {
        return "<p id = 'main'> 5 seconds count down </br> The number will show up in <span id='time'>3</span> seconds...</p>";
    }
    else if ($state == 2)
    {
        return "<p id = 'main'> #$result</br> Press the key when you finish pointing</p>";
    }
    else if ($state == 3)
    {
        return "<p id = 'main'> Please keep your dominant hand still</p>";
    }
    else
    {
        return "<p id = 'main'> Please pull back your hand </br> Current trial finished </br> Please wait for instructions</p>";
    }

}

function o_view($state)
{
    if ($state == 0)
    {
        return "<p id = 'main'> When you are ready to start</br> press ENTER</p>";
    }
    else if ($state == 1)
    {
        return "<p>Waiting for instruction</p>";
    }
    else if ($state == 2)
    {
        return "<p> Look at the table 
        </br> See which number is the cube that the pointer is pointing at
        </br> Click ENTER when you have made your choice
        </p>";
        
    }
    else if ($state == 3)
    {
        return "
        <form action='' method = 'post'>
        <div id = 'btn'>
            <button id = 'btn_number'>#1</button>
            <button id = 'btn_number'>#2</button>
            <button id = 'btn_number'>#3</button>
            <button id = 'btn_number'>#4</button>
            <button id = 'btn_number'>#5</button>
            <button id = 'btn_number'>#6</button>
            <button id = 'btn_number'>#7</button>
            <button id = 'btn_number'>#8</button>
            <button id = 'btn_number'>#9</button>
            <br>
            <button id = 'btn_number'>#10</button>
            <button id = 'btn_number'>#11</button>
            <button id = 'btn_number'>#12</button>
            <button id = 'btn_number'>#13</button>
            <button id = 'btn_number'>#14</button>
            <button id = 'btn_number'>#15</button>
            <button id = 'btn_number'>#16</button>
            </div>
            </form>

            <div class='text-center small' style= 'margin-top: 7%;'>
            <a href='../view/setup.php' style='
            color: #64C7FA;
            text-decoration: none;
            background-color: transparent;
            background: white;
            font-size: 250%;
            padding: 1.5%;
            border-radius: 29px;'>
            Confirm</a>
            </div>
            "; 
        

    }
    else 
    {
        return "

        <p> Please rate the confidence level of your observation </p>

        <p id = 'state_three'>
        <form action='' method = 'post'>
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

            </form>
            </p>
            <div class='text-center small' style= 'margin-top: 7%;'>
            <a href='../view/setup.php' style='
            color: #64C7FA;
            text-decoration: none;
            background-color: transparent;
            background: white;
            font-size: 250%;
            padding: 1.5%;
            border-radius: 29px;'>
            Confirm</a>
            </div>

        ";
    }
}
?>
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
        
            <div id = 'btn'>
            <input type = 'radio' id = 'btn_number' name = 'selected_num' value = '1' >#1</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '2'>#2</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '3'>#3</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '4'>#4</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '5'>#5</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '6'>#6</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '7'>#7</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '8'>#8</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '9'>#9</input>
            <br>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '10'>#10</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '11'>#11</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '12'>#12</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '13'>#13</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '14'>#14</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '15'>#15</input>
            <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '16'>#16</input>
            </div>
            
            <div class='text-center small' style= 'margin-top: 7%;'>
            <button onclick = 'identified_number_submit()' style='
            color: #64C7FA;
            text-decoration: none;
            background-color: transparent;
            background: white;
            font-size: 250%;
            padding: 1.5%;
            border-radius: 29px;'> Confirm </button>
            </div>
            
            "; 
            // <form action='' method = 'post'>
            // </form>
        
            // <a onclick = 'identified_number_submit()'  style='
            // color: #64C7FA;
            // text-decoration: none;
            // background-color: transparent;
            // background: white;
            // font-size: 250%;
            // padding: 1.5%;
            // border-radius: 29px;'>
            // Confirm</a>
    }
    else 
    {
        return "

        <p> Please rate the confidence level of your observation </p>
        <div id = 'btn'>
        <input type = 'radio' id = 'btn_number' name = 'confidence' value = '1' > Not at all confident</input>
        <input type = 'radio' id = 'btn_number'  name = 'confidence' value = '2'>#2</input>
        <input type = 'radio' id = 'btn_number'  name = 'confidence' value = '3'>#3</input>
        <input type = 'radio' id = 'btn_number'  name = 'confidence' value = '4'>Somewhat confident</input>
        <input type = 'radio' id = 'btn_number'  name = 'confidence' value = '5'>#5</input>
        <input type = 'radio' id = 'btn_number'  name = 'confidence' value = '6'>#6</input>
        <input type = 'radio' id = 'btn_number'  name = 'confidence' value = '7'>Very confident</input>
    
        </div>
        
        <div class='text-center small' style= 'margin-top: 7%;'>
        <button onclick = 'confidence_level()' style='
        color: #64C7FA;
        text-decoration: none;
        background-color: transparent;
        background: white;
        font-size: 250%;
        padding: 1.5%;
        border-radius: 29px;'> Confirm </button>
        </div>

        ";
    }
}
?>
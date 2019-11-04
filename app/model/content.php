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

  



    $test_number = "SELECT * FROM `test_number` WHERE trial_number = '$result'";
    $result = mysqli_query($con, $test_number);
    $t = $result->fetch_assoc();

    $trial_number = "SELECT * FROM `experiment_info` ORDER BY date DESC LIMIT 1 ";
    $q = mysqli_query($con, $trial_number);
    $p = $q->fetch_assoc();
    $q = $p["experiment_id"]; 
    $set = 'Set_'.(string)$q;

    $result = $t[$set]; 

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
            <div id = 'label_2'><input type='radio' name='selected_num' value='1' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#1</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='2' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#2</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='3' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#3</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='4' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#4</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='5' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#5</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='6' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#6</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='7' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#7</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='8' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#8</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='9' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#9</label></div>

            <br>
            <div id = 'label_2'><input type='radio' name='selected_num' value='10' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#10</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='11' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#11</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='12' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#12</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='13' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#13</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='14' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#14</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='15' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#15</label></div>
            <div id = 'label_2'><input type='radio' name='selected_num' value='16' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#16</label></div>
            </div>
            
            <div class='text-center small' style= 'margin-top: 7%;'>
            <button onclick = 'identified_number_submit()' style='
            color: #64C7FA;
            text-decoration: none;
            background-color: transparent;
            background: white;
            font-size: 250%;
            padding: 1.5%;
            border-radius: 29px;
            border: #64C7FA;'> Confirm </button>
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

            // <input type = 'radio' id = 'btn_number' name = 'selected_num' value = '1' >#1</input>
            // <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '2'>#2</input>
            // <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '3'>#3</input>
            // <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '4'>#4</input>
            // <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '5'>#5</input>
            // <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '6'>#6</input>
            // <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '7'>#7</input>
            // <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '8'>#8</input>
            // <input type = 'radio' id = 'btn_number'  name = 'selected_num' value = '9'>#9</input>
    }
    else 
    {
        return "

        <p> Please rate the confidence level of your observation </p>
        <div id = 'btn'>
        
        <div id = 'label'><input type='radio' name='confidence' value='1' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#1</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='2' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#2</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='3' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#3</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='4' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#4</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='5' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#5</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='6' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#6</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='7' id='btn_number-one' class='form-radio' checked><label for='radio-one'>#7</label></div>
           
        </div>
        <div>
        <p class = 'conf_label'>Not at all confident</p>
        <p class = 'conf_label'>Somewhat confident</p>
        <p class = 'conf_label'>Very confident</p>
        </div>

        <div class='text-center small' style= 'margin-top: 7%;'>
        <button onclick = 'confidence_level()' style='
        color: #64C7FA;
        text-decoration: none;
        background-color: transparent;
        background: white;
        font-size: 250%;
        padding: 1.5%;
        border-radius: 29px;
        border: #64C7FA;'> Confirm </button>
        </div>

        ";
    }
}
?>
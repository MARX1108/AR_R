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

    $rehearsal = $p["rehearsal"]; 
    if(strcmp($rehearsal, 'on')==0)
    {
        // $result = rand(1,16);
        $set = 'Set_9';
    }
    
    $result = $t[$set]; 
    


    if ($state == 0)
    {
        return "<p id = 'main'> All trials finished! </p>";
    }
    else if ($state == 1)
    {
        return "<p id = 'main'>Press Enter to start the next trial. </br> A number will show up.</p>";
    }
    else if ($state == 2)
    {
        return "<p id = 'main'>$result</br> Keep your  hand stil.</p>";
    }
    else if ($state == 3)
    {
        return "<p id = 'main'>$result</br> Keep your  hand stil.</p>";
    }
    else
    {
        return "<p id = 'main'>  Pull back your hand. </br> </p>";
    }

}

function o_view($state)
{
    if ($state == 0)
    { 
        return "<p id = 'main'> All trials finished!</p>";
    }
    else if ($state == 1)
    {
        return "<p>Waiting for instruction.</p>";
    }
    else if ($state == 2)
    {
        return "<p>  Identify the number the pointer is pointing at
        </br> Press Touchpad when you have made your choice.
        </p>";
        
    }
    else if ($state == 3)
    {
        $arg = "<div class='icon' > 
        

                <button id = 'confirmBtn' onclick = 'identified_number_submit()' style='
                color: #64C7FA;
                text-decoration: none;
                background-color: transparent;
                background: white;
                border-radius: 29px;
                border: #64C7FA;'> Confirm </button>


                <ul class='menu'>
                ";

        
        for ($x = 1; $x <= 16; $x++)
        {
            $li = "<li class='spread'>
            <a class='unit' id = 'unit_".$x."' href='javascript:void(0)' onclick='fire(".$x.");'>".$x."<input type='radio' name='selected_num' value='".$x."' id='btn_number_".$x."' class='form-radio'/>
            </a>
            </li>";
            $arg = $arg.$li;
        }

        $arg = $arg."</ul>
        <p style = '
        font-size: 100%;
        margin-top: 72%;
        margin-left: -370px;
        width: 1000px;'> Click Number to select the number you identified. </p> 

        <!--  
            </div>
                <p> Select the number you identified. </p> 
  
              <div class='text-center small' style= 'margin-top: 3%;'>
              <button id = 'confirmBtn' onclick = 'identified_number_submit()' style='
              color: #64C7FA;
              text-decoration: none;
              background-color: transparent;
              background: white;
              font-size: 250%;
              padding: 1.5%;
              border-radius: 29px;
              border: #64C7FA;'
              
              > Confirm </button>
              </div> -->";
  
              
              
        return $arg; 

            
    }
    else 
    {
        return "
    
        <p> Please rate the confidence level of your observation.  </p> 

        <div class='text-center small' style= 'margin-top: 1%;'>
            <button id = 'confidenceBtn' onclick = 'confidence_level()' style='
            color: #64C7FA;
            text-decoration: none;
            background-color: transparent;
            background: white;
            font-size: 350%;
            padding: 1.5%;
            border-radius: 29px;
            border: #64C7FA;'
            > Confirm </button>
            </div>

        
        <div id = 'btn'>
        
        <div id = 'label'><input type='radio' name='confidence' value='1' id='btn_number-one' class='form-radio' ><label for='radio-one'>1</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='2' id='btn_number-one' class='form-radio' ><label for='radio-one'>2</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='3' id='btn_number-one' class='form-radio' ><label for='radio-one'>3</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='4' id='btn_number-one' class='form-radio' ><label for='radio-one'>4</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='5' id='btn_number-one' class='form-radio' ><label for='radio-one'>5</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='6' id='btn_number-one' class='form-radio' ><label for='radio-one'>6</label></div>
        <div id = 'label'><input type='radio' name='confidence' value='7' id='btn_number-one' class='form-radio' ><label for='radio-one'>7</label></div>
           
        </div>
        <div>
        <p class = 'conf_label'>Not at all confident</p>
        <p class = 'conf_label'>Somewhat confident</p>
        <p class = 'conf_label'>Very confident</p>
        </div>



        ";
    }
}
?>
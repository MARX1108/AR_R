<?php





function p_view($state)
{
    if ($state == 0)
    {
        return "<p id = 'main'> please wait for instruction</p>";
    }
    else if ($state == 1)
    {
        return "<p id = 'main'> count down in <span id='time'>5</span> seconds...</p>";
    }
    else if ($state == 2)
    {
        return "<p id = 'main'> #16 </br> press the key when you finish pointing</p>";
    }
    else if ($state == 3)
    {
        return "<p id = 'main'> please hold your hands </p>";
    }
    else
    {
        return "<p id = 'main'> please pull back your hands </br>  round 1 finished \n </p>";
    }

}

function o_view($state)
{
    if ($state == 0)
    {
        return "<p id = 'main'> please wait for instruction</p>";
    }
    else if ($state == 1)
    {
        return "<p> Look at the table 
        </br> observe which number is the one pointer point at 
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
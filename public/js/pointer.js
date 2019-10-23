$(document).ready(function () {
    sync();
    state_inquery();
    // $('#state > h2').html("Step Locked");
    // $('#instruction').html("<p id = 'main'> please waiting for instruction </p>");
});

$(document).on("keypress", function (e) {
    if (e.which == 13) {
        state_inquery();
    }
});

function callback(output) {
    
    step = parseInt(output.state);
    trial = parseInt(output.trial_number);

    // alert(trial);
    string = output.content;
    append(step, string, trial);
}

function append(step, string, trial) 
{
    $('#state > h2').html("Step " + step + " Trial " + trial);
    // alert(string);
    $('#instruction').html(string);

    if(step == 1)
    {
        countdown(5);
    }
}   

function state_inquery() {
    $.ajax({
        url: '../model/count.php',
        data: {
            state: 'pointer'
        },
        method: 'post',
        dataType: 'json',
        success: callback,
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}


function setpage(view, state) {
    $.ajax({
        url: '../model/manual.php',
        data: {
            view: view,
            state_number: state
        },
        method: 'post',
        dataType: 'json',
        success: callback,
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function sync() {
        $.ajax(
            {
            url: '../model/sync.php',
            data: {
                instruction: ' '
            },
            method: 'post',
            dataType: 'json',
            success: function(output)
            {
                setTimeout(sync, 1000);
                var ostate = parseInt(output.ostate);
                var pstate = parseInt(output.pstate);
                if(pstate == 0) setpage("pointer", pstate);
                // if(pstate == 1) setpage("pointer", pstate);
                if(pstate == 2 && ostate != 2) setpage("pointer", 2);

                if(ostate == 2) setpage("pointer", 4);
                if(ostate == 4 && pstate != 1)
                {   
                    // alert("test");
                    increment_trial_count('T1');                 
                    setpage("pointer", 1);

                } 
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
}
function increment_trial_count(instruction)
{
    $.ajax(
        {
        url: '../model/trial_number_count.php',
        data: {
            instruction: instruction
        },
        method: 'post',
        dataType: 'json',
        success: function(output)
        {
            // $('#state > h2').append(" Trial " + output.trial_number);
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}
function countdown(time)
{
    var timer = time, seconds;

var x = setInterval(function() 
{
    // minutes = parseInt(timer / 60, 10);
    seconds = parseInt(timer % 60, 10);

    // minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ?  seconds : seconds;


    // Display the result in the element with id="demo"

        document.getElementById("time").innerHTML = seconds;

    // If the count down is finished, write some text
    if (--timer < 0) {
      clearInterval(x);
      setpage("pointer", 2);
    }
  }, 1000);
}


$(document).ready(function () {
    state_inquery();
    sync();
    // $('#state > h2').html("Step Locked");
    // $('#instruction').html("<p id = 'main'> please waiting for instruction </p>");
})

$(document).on("keypress", function (e) {
    if (e.which == 13) {
        state_inquery();
    }
})

function callback(output) {

    step = parseInt(output.state);
    trial = parseInt(output.trial_number);

    if (step == 2)
    {
        // alert("test");
        send_data('T3'); 
    }
    else if (step == 3)
    {
        send_data('T4'); 
    }

    string = output.content;
    append(step, string, trial);
    if (step == 4) {
        countdown(5);
    }
}

function append(step, string, trial) {
    $('#state > h2').html("Step " + step + " Trial " + trial);
    $('#instruction').html(string);
}

function state_inquery() {
    $.ajax({
        url: '../model/count.php',
        data: {
            state: 'observer'
        },
        method: 'post',
        dataType: 'json',
        success: callback,
        error: function (xhr, status, error) {
            // alert(xhr.responseText);
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
            // alert(xhr.responseText);
        }
    });
}
function send_data(data)
{
    $.ajax(
        {
        url: '../model/send_data.php',
        data: {
            data:data
        },
        method: 'post',
        dataType: 'json',
        success: function(output)
        {
            // $('#state > h2').append(" Trial " + output.trial_number);
        },
        error: function (xhr, status, error) {
            // alert(xhr.responseText);
        }
    });
}
function countdown(time) {
    var timer = time,
        seconds;

    var x = setInterval(function () {
        // minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        // minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? seconds : seconds;


        // Display the result in the element with id="demo"
        document.getElementById("time").innerHTML = seconds;
        // If the count down is finished, write some text
        if (--timer < 0) {
            clearInterval(x);
            setpage("observer", 1);
        }
    }, 1000);
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
            if(ostate == 0) setpage("observer", ostate);
            if(ostate == 1) setpage("observer", ostate);



        },
        error: function (xhr, status, error) {
            // alert(xhr.responseText);
        }
    });
}



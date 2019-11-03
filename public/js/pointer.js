$(document).ready(function () {
    sync();
    setpage("pointer", 0);
    setpage("observer", 0);

    step = parseInt($('#step').text());

    // state_inquery();
});

$(document).on("keypress", function (e) {
    if (e.which == 13) {
        // state_inquery();
        controller();
    }
});

function sync() {
    $.ajax({
        url: '../model/sync.php',
        data: {
            instruction: ' '
        },
        method: 'post',
        dataType: 'json',
        success: function (output) 
        {
            if (output.pstate == 1)
            {
                countdown(3);
                setpage("pointer", 2);
                setTimeout(function(){sync();}, 4000);
            }
            else
            {
                setTimeout(function(){sync();}, 100);
            }
            

            // if(output.pstate == 3 && output.ostate != 2) 
            // {
            //     setpage("observer", 2);
            // }

            // if ( output.pstate != 4 && output.ostate == 3)
            // {
            //     setpage("pointer", 4);
            // }


            

            $('#trial').html(output.trial_number);
            $('#step').html(output.pstate);
            $('#observer_step').html(output.ostate);
            updateContent(output.pstate);

        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function controller()
{
    var step = parseInt($('#step').text());
    var trial = parseInt($('#trial').text());
    var observer_step = parseInt($('#observer_step').text());

    if (step == 0) 
    {
        setpage("pointer", 1);
    }

    else if (step == 2 && observer_step == 1) 
    {
        // send_data('T1');
        setpage("pointer", 3);
        setpage("observer", 2);
    }

    // else if (step == 3) 
    // {
    //     // send_data('T2');
    //     setpage("pointer", 4);
    // }

    console.log(step);
    // console.log(trial);
    // console.log(observer_step);
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
        // success: callback,
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}


function updateContent(state)
{
    $.ajax({
        url: '../model/content.php',
        data: {
            fetchContent: 'true',
            clientView:'pointer',
            state:state
        },
        method: 'post',
        dataType: 'json',
        success: function (output) {
            $('#instruction').html(output.content);
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}


function increment_trial_count() {
    $.ajax({
        url: '../model/trial_number_count.php',
        data: {

        },
        method: 'post',
        dataType: 'json',
        success: function (output) {
            // alert(output.test);
            console.log(
                "experiment_id: ", output.experiment_id,
                " pointer_ID: ", output.pointer_ID,
                " observer_ID: ", output.observer_ID,
                " virtual_type: ", output.virtual_type,
                " spatial_type: ", output.spatial_type,
                " rehearsal: ", output.rehearsal,
                " testing_number_set: ", output.testing_number_set
            );
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function send_data(data) {
    $.ajax({
        url: '../model/send_data.php',
        data: {
            data: data
        },
        method: 'post',
        dataType: 'json',
        success: function (output) {
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
        seconds = parseInt(timer % 60, 10);
        seconds = seconds < 10 ? seconds : seconds;
        document.getElementById("time").innerHTML = seconds;
        if (timer == 2) increment_trial_count();
        console.log(seconds);
        if (--timer < 0) {
            clearInterval(x);

        }
    }, 1000);
}
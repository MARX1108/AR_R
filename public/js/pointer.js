$(document).ready(function () {
    sync();
    setpage("pointer", 0);
    setpage("observer", 0);
    step = parseInt($('#step').text());

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
        success: function (output) {
            $('#trial').html(output.trial_number);
            $('#step').html(output.pstate);
            $('#observer_step').html(output.ostate);

            if (parseInt($('#step').text()) == 1 && output.trial_state == 1) 
            {
                console.log("parseInt($('#step').text()) == 1 && output.trial_state== 1");
                updateContent(1);
                trial_state(0);
                countdown(3, output.trial_state);
                setTimeout(function () {
                    sync();
                }, 3000);
            }
            else
            {
                updateContent(output.pstate);
                setTimeout(function () {
                    sync();
                }, 1000);
            }

            

            
            
            

        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function controller() {
    var step = parseInt($('#step').text());
    var trial = parseInt($('#trial').text());
    var observer_step = parseInt($('#observer_step').text());
    if (trial != -1) {
        if (step == 0) {
            setpage("pointer", 1);
        } else if (step == 2 && observer_step == 1) {
            send_data('T2');
            setpage("pointer", 3);
            setpage("observer", 2);
        }
    }


    console.log(step);

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


function updateContent(state) {
    $.ajax({
        url: '../model/content.php',
        data: {
            fetchContent: 'true',
            clientView: 'pointer',
            state: state
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
    // alert('increment');
    $.ajax({
        url: '../model/trial_number_count.php',
        data: {

        },
        method: 'post',
        dataType: 'json',
        success: function (output) {
            // alert(output.test);
            // console.log(
            //     "experiment_id: ", output.experiment_id,
            //     " pointer_ID: ", output.pointer_ID,
            //     " observer_ID: ", output.observer_ID,
            //     " virtual_type: ", output.virtual_type,
            //     " spatial_type: ", output.spatial_type,
            //     " rehearsal: ", output.rehearsal,
            //     " testing_number_set: ", output.testing_number_set
            // );
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

function countdown(time, trial_state) {
    if (trial_state == 1) {
        console.log("countdown started!");
        var timer = time,
            seconds;

        var x = setInterval(function () {
            seconds = parseInt(timer % 60, 10);
            seconds = seconds < 10 ? seconds : seconds;
            // document.getElementById("time").innerHTML = seconds;
            if (timer == 2) increment_trial_count();
            console.log(seconds);
            if (--timer < 0) {
                send_data('T1');
                clearInterval(x);
                console.log("countdown finished!");
                setpage("pointer", 2);
            }
        }, 800);


        $.ajax({
            url: '../model/trial_state.php',
            data: {
                trial_state: 0
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
    else
    {
        alert("Invalid start. Please reset the experiment to start");
    }

}

function trial_state(state) {

    $.ajax({
        url: '../model/trial_state.php',
        data: {
            trial_state: state
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
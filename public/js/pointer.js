$(document).ready(function () {
    sync();
    setpage("pointer", 0);
    setpage("observer", 0);
    step = parseInt($('#step').text());
    var count = 0;
    // Active
    window.addEventListener('focus', startTimer);
   
    // Inactive
    window.addEventListener('blur', stopTimer);
   
    function timerHandler() {
     count++;
     document.getElementById("seconds").innerHTML = count;
    }
    // Start timer
    function startTimer() {
     console.log('focus');
    }
   
    // Stop timer
    function stopTimer() {
   console.log('blur');
    }

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

            updateContent(output.pstate);
            setTimeout(function () {
                sync();
            }, 100);

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
            // increment_trial_count();
        } else if (step == 1) {
            
            setpage("observer", 2);
            setpage("pointer", 2);
            trial_state(0);

            send_data('T1');

        } else if (step == 2 ) {
            send_data('T2');
            setpage("pointer", 3);
            
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
        success: function (output) {},
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

    } else {
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
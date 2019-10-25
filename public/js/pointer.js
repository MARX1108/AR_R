$(document).ready(function () {
    sync();
    setpage("pointer", 0);
    // state_inquery();
});

$(document).on("keypress", function (e) {
    if (e.which == 13) {
        state_inquery();
    }
});

function callback(output) {
    step = parseInt(output.state);
    trial = parseInt(output.trial_number);
    string = output.content;

    // console.log("trial number: ", trial);
    if (step == 1) {
        trial = trial + 1;
    }
    if (step == 2) {
        send_data('T1');
    }
    if (step == 3) {
        send_data('T2');
    }
    append(step, string, trial);
    if (step == 1) {
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
            state: 'pointer'
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

function sync() {
    $.ajax({
        url: '../model/sync.php',
        data: {
            instruction: ' '
        },
        method: 'post',
        dataType: 'json',
        success: function (output) {
            setTimeout(function(){sync();}, 100);
            var ostate = parseInt(output.ostate);
            var pstate = parseInt(output.pstate);
            console.log("pstate:  ", pstate);
            console.log("ostate:  ", ostate);

            if (pstate == 0) setpage("pointer", 0);
            if (ostate == 2) setpage("pointer", 4);
            if ((ostate == 4 &&
                    pstate == 4) || (ostate == 4 &&
                    pstate == 3)) setpage("pointer", 1);
        },
        error: function (xhr, status, error) {
            // alert(xhr.responseText);
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

        },
        error: function (xhr, status, error) {
            // alert(xhr.responseText);
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

        if (--timer < 0) {
            clearInterval(x);
            // send_data('T1');
            setpage("pointer", 2);
        }
    }, 1000);
}
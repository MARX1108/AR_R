var currentState = 0 ;
$(document).ready(function () {

    
    sync();
    setpage("observer", currentState);
    setpage("pointer", currentState);
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

 
                setTimeout(function () {
                    sync();
                }, 1000);
            
                if(currentState != output.ostate){
                    updateContent(output.ostate);
                    currentState = output.ostate;
                }/*
            if (output.ostate != 3 && output.ostate != 4 ) {
                // console.log("step 4");
                updateContent(output.ostate);
            }
*/
            

            $('#trial').html(output.trial_number);
            $('#step').html(output.ostate);
            $('#pointer_step').html(output.pstate);


        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function controller() {
    var step = parseInt($('#step').text());
    var trial = parseInt($('#trial').text());
    var pointer_step = parseInt($('#pointer_step').text());
    if (trial != -1) {
        if (step == 0 && pointer_step <= 2) {
            setpage("observer", 1);
            updateContent(1);
        }
        else if (step == 2 ) {
            send_data('T3');
            setpage("observer", 3);
            updateContent(3);
            setpage("pointer", 4);
        } else if (step == 3) 
        {
            if(!isNaN(parseInt($('input[name=selected_num]:checked').val())))
            {
                send_data('T4');
                identified_number_submit();
                setpage("observer", 4);
                updateContent(4);
            }
            else
            {
                alert("You didn't select any number.\n Press Enter to dismiss the alert.");
            }
            
        } else if (step == 4 && pointer_step == 4 && trial != 20) 
        {
            if(!isNaN(parseInt($('input[name=confidence]:checked').val())))
            {
                confidence_level();
               
                trial_state(1);
                increment_trial_count();
                setpage("observer", 1);
                setpage("pointer", 1);
            }
            else
            {
                alert("You didn't select any number.\n Press Enter to dismiss the alert.");
            }
           
        } else if (step == 4 && pointer_step == 4 && trial == 20) 
        {
            confidence_level();
            setpage("observer", 0);
            setpage("pointer", 0);
        }
    }

}

function increment_trial_count(successFunc) {
    // alert('increment');
    $.ajax({
        url: '../model/trial_number_count.php',
        data: {

        },
        method: 'post',
        dataType: 'json',
        success: function(){
            console.log("success");
            // successFunc();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);}
    });
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

function setpage(view, state) {
    console.log("view:" +view + " currentState:" + currentState + " toState:" +state);
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
    // alert(state);
    console.log("content updated");
    $.ajax({
        url: '../model/content.php',
        data: {
            fetchContent: 'true',
            clientView: 'observer',
            state: state
        },
        method: 'post',
        dataType: 'json',
        success: function (output) {
            console.log("content return:", output);
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
            // $('# state > h2 ').append(" Trial " + output.trial_number);
        },
        error: function (xhr, status, error) {
            // alert(xhr.responseText);
        }
    });
}


function identified_number_submit() {
    number = parseInt($('input[name=selected_num]:checked').val());
    console.log(number);
    if (!isNaN(number)) {
        $.ajax({
            url: '../model/selected_num.php',
            data: {
                selected_num: number
            },
            method: 'post',
            success: function () {
                // controller();
                setTimeout(function () {
                    $.ajax({
                        url: '../model/sync.php',
                        data: {
                            instruction: ' '
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function (output) {

                            $('#trial').html(output.trial_number);
                            $('#step').html(output.ostate);
                            $('#pointer_step').html(output.pstate);
                            // updateContent(output.ostate);
                        },
                        error: function (xhr, status, error) {
                            alert(xhr.responseText);
                        }
                    });
                }, 1000);

            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    } else {
        $('#confirmBtn').css({
            'color': '#eff0f1'
        });
    }

}



function confidence_level() {
    number = parseInt($('input[name=confidence]:checked').val());
    console.log(number);
    if (!isNaN(number)) {
        $.ajax({
            url: '../model/confidence_level.php',
            data: {
                confidence: number
            },
            method: 'post',
            success: function () {
                // controller();
                setTimeout(function () {
                    $.ajax({
                        url: '../model/sync.php',
                        data: {
                            instruction: ' '
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function (output) {
                            $('#trial').html(output.trial_number);
                            $('#step').html(output.ostate);
                            $('#pointer_step').html(output.pstate);
                            updateContent(output.ostate);
                        },
                        error: function (xhr, status, error) {
                            alert(xhr.responseText);
                        }
                    });
                }, 1000);

            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    } else {
        $('#confirmBtn').css({
            'color': '#eff0f1'
        });
    }

}



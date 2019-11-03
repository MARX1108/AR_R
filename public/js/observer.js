$(document).ready(function () {
    sync();
    setpage("observer", 0);
    setpage("pointer", 0);
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


            setTimeout(function(){sync();}, 100);

            $('#trial').html(output.trial_number);
            $('#step').html(output.ostate);
            $('#pointer_step').html(output.pstate);
            updateContent(output.ostate);



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
    var pointer_step = parseInt($('#pointer_step').text());

    if (step == 0 && pointer_step <= 2) 
    {
        setpage("observer", 1);
    }
    else if (step == 2 && pointer_step ==3) 
    {
        send_data('T3'); 
        setpage("observer", 3);
        setpage("pointer", 4);
    }
    else if (step == 3 ) 
    {
        // send_data('T4'); 
        setpage("observer", 4);
    }
    else if (step == 4 && pointer_step == 4 ) 
    {
        send_data('T4'); 
        setpage("observer", 1);
        setpage("pointer", 1);
        
    }

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
            clientView:'observer',
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

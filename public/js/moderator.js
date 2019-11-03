$(document).ready(function () {
    sync();
});

function callback(output) {
    alert(output);
}

function control(command) {
    // $('.body').replaceWith('');
    console.log("clicked");
    $.ajax({
        url: '../model/moderator.php',
        data: {
            command: command
        },
        method: 'post',
        success: callback,
        error: function (xhr, status, error) {
            alert(xhr.responseText);
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
            success: function (output) 
            {
                setTimeout(function(){sync();}, 100);

                $('#trial').html(output.trial_number);
                $('#pointer_step').html(output.pstate);
                $('#observer_step').html(output.ostate);
    
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
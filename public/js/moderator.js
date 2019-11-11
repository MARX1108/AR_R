$(document).ready(function () {
    sync();
});

function callback(output) {
    alert(output);
}

function trial_state(state)
{

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

function control(command) {
    // $('.body').replaceWith('');
    console.log("clicked");
    if(command == "reset")
    {
        trial_state(0);
        switch_tab();
    }

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

    function switch_tab()
    {
        // chrome.browserAction.onClicked.addListener(function(tab) {
        //     var found = false;
        //     var tabId;
        //     chrome.tabs.query({}, function (tabs) {
        //         for (var i = 0; i < tabs.length; i++) {
        //             if (tabs[i].url.search("http://localhost:8080/ARR/app/controller/PointerController.php") > -1){
        //                 found = true;
        //                 tabId = tabs[i].id;
        //             }
        //         }
        //         if (found == false){
        //             chrome.tabs.executeScript(null,{file: "buy.js"});
        //         } else {
        //             chrome.tabs.update(tabId, {selected: true});
        //         }
        //     });
        // });
    }
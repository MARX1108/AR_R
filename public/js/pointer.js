$(document).ready(function () {
    sync();
    $('#state > h2').html("Step Locked");
    $('#instruction').html("<p id = 'main'> please waiting for instruction </p>");
});

$(document).on("keypress", function (e) {
    if (e.which == 13) {
        state_inquery();
    }
});

function callback(output) {
    step = parseInt(output.state);
    string = output.content;
    append(step, string);
}

function append(step, string) {
    $('#state > h2').html("Step " + step);
    // alert(string);
    $('#instruction').html(string);

    if(step == 0)
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
                if(ostate == 2) setpage("pointer", 3);
                if(ostate == 4 && pstate != 0)
                {                    
                    setpage("pointer", 0);
                } 
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
      setpage("pointer", 1);
    }
  }, 1000);
}


$(document).ready( function()
        {
            $('#state > h2').html("Step Locked");
            $('#instruction').html("<p id = 'main'> please waiting for instruction </p>");
        }
        )
        $(document).on("keypress", function(e){
            if(e.which == 13)
            {   
                state_inquery();
            }
        })

        function callback(output)
        {

            step = parseInt(output.state);

            string = output.content;
            append(step, string);
            if(step == 4)
            {
                countdown(5);                 
            }
        }

        function append(step, string)
        {
            $('#state > h2').html("Step " + step);
            $('#instruction').html(string);
        }

        function state_inquery() {
        $.ajax(
                    {
                        url: '../model/count.php',
                        data: {state: 'observer'},
                        method: 'post',
                        dataType: 'json',
                        success: callback,
                        error: function(xhr, status, error) 
                        {
                            alert(xhr.responseText);
                        }
                    }
                );
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
              setpage("observer", 1);
            }
          }, 1000);
        }
        
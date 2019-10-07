<!DOCTYPE html>
<html>
<?php
    session_start();
?>

<head>
    <title>starter</title>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type = "text/css" href="css/observer_view.css">
    <!-- <meta http-equiv="refresh" content="1" > -->
    <script  src = "./js/require.js"></script>
    <script  src = "./js/jquery-3.4.1.js"></script>
    <script>
        
        $(document).on("keypress", function(e){
            if(e.which == 13)
            {   
                $.ajax({ url: 'moderator_view.php',
                data: {action: 'observer'},
                type: 'post',
                success: function(output) 
                {
                        // alert(output);
                }
                    });
            }
            
        })
                
    </script>

    
</head>
<body>
    <div id='div_session_write'> 

    </div>
    <!-- <input type="text" id="txt"/> -->
    <h1 id="demo"></h1>

    <div class = "header" id = "state_info">
        <h1>Observer View</h1>
        <h2><?php 
        echo "Step ".$_SESSION['O_state'];
        ?></h2>
    </div>
    <div class = "content" id = "instruction">
        <!-- <p>Please wait for instructions</p> -->
        <p>
        <?php 
            

            if ($_SESSION["O_state"] == 0)
            {
                echo "Please wait for instructions!";
                if ($_SESSION["P_state"] == 3)
                {
                    $_SESSION["O_state"] = 1; 
                }
            }
            else if ($_SESSION["O_state"] == 1)
            {
                echo "Click Button to Start";
            }
            else if ($_SESSION["O_state"] == 3)
            {
                echo "How confident are you about your selection?"; 
            }
            else if ($_SESSION["O_state"] == 4)
            {
                echo "Round 1 Finished"; 

                $_SESSION["O_state"] = 0; 
                $_SESSION["P_state"] = 0; 
                $_SESSION['trial_count'] = $_SESSION['trial_count']+1;
                $_SESSION['trial_state'] = 0;
            }

            
            // else if ($_SESSION["O_state"] == 5)
            // {
            //     echo "Debug Model";
            // }
        ?>
        </p>
        <p id = "state_two">
            <?php
            if ($_SESSION["O_state"] == 2)
            {
                echo "
                    <button>#1</button>
                    <button>#2</button>
                    <button>#3</button>
                "; 
                echo "<br>"; 
                echo "
                    <button>#4</button>
                    <button>#5</button>
                    <button>#6</button>
                "; 
                echo "<br>"; 
                echo "
                    <button>#7</button>
                    <button>#8</button>
                    <button>#9</button>
                "; 

            }
            ?>
        </p>
    </div>

    <!-- <div class="btn-group">
        <button>Apple</button>
        <button>Samsung</button>
        <button>Sony</button>
    </div> -->
    
</body>
</html>
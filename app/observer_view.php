<!DOCTYPE html>
<html>
<?php
    // session_start();
    include("connection.php")
?>

<head>
    <title>Observer View</title>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type = "text/css" href="css/observer_view.css">
    <meta http-equiv="refresh" content="1" >
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
        
        <?php 
        
            if ($_SESSION["O_state"] == 0)
            {
                echo "<p> Please wait for instructions! <p>";
                if ($_SESSION["P_state"] == 3)
                {
                    $_SESSION["O_state"] = 1; 
                }
            }
            else if ($_SESSION["O_state"] == 1)
            {
                echo "<p> Click ENTER when you have made your choice <p>";
            }
            else if ($_SESSION["O_state"] == 4)
            {
                echo "<p> Round 1 Finished<p> "; 

                $_SESSION["O_state"] = 0; 
                $_SESSION["P_state"] = 0; 
                $_SESSION['trial_count'] = $_SESSION['trial_count']+1;
                $_SESSION['trial_state'] = 0;
            }
            else if ($_SESSION["O_state"] == 2)
            {   
                echo "<div id = 'btn'>";
                echo "
                    <button id = 'btn_number'>#1</button>
                    <button id = 'btn_number'>#2</button>
                    <button id = 'btn_number'>#3</button>
                "; 
                echo "<br>"; 
                echo "
                    <button id = 'btn_number'>#4</button>
                    <button id = 'btn_number'>#5</button>
                    <button id = 'btn_number'>#6</button>
                "; 
                echo "<br>"; 
                echo "
                    <button id = 'btn_number'>#7</button>
                    <button id = 'btn_number'>#8</button>
                    <button id = 'btn_number'>#9</button>
                "; 
                echo "</div>";
            }

        ?>
        </p>

        <p id = "state_three_question">
            <?php
            if ($_SESSION["O_state"] == 3)
            { 
                echo "<p> How confident are you about your selection? <p> "; 
            }
            ?>
        </p>

        <p id = "state_three">
            <?php
            if ($_SESSION["O_state"] == 3)
            {
                echo "
                <label class='container'>
                    <input type='checkbox'>
                    <span class='checkmark'></span>
                </label>

                <label class='container'>
                    <input type='checkbox'>
                    <span class='checkmark'></span>
                </label>

                <label class='container'>
                    <input type='checkbox'>
                    <span class='checkmark'></span>
                </label>

                <label class='container'>
                    <input type='checkbox'>
                    <span class='checkmark'></span>
                </label>

                <label class='container'>
                    <input type='checkbox'>
                    <span class='checkmark'></span>
                </label>

                <label class='container'>
                    <input type='checkbox'>
                    <span class='checkmark'></span>
                </label>

                <label class='container'>
                    <input type='checkbox'>
                    <span class='checkmark'></span>
                </label>
                "; 
            }
            ?>
        </p>

        <p id = "state_two_selection">
            <?php            
            if ($_SESSION["O_state"] == 3)
            {
                echo "Not at All Confident" ; 
            }
            ?>
        </p>

    </div>
    
</body>
</html>
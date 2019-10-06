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
    <link rel="stylesheet" type = "text/css" href="css/pointer_view.css">
    <meta http-equiv="refresh" content="2" >

    <script>
        var temp = 0;
        $(document).on("keypress", function(e){
            // 
            if(e.which == 13)
            {
                location.reload();

                    // $_SESSION["P_state"] = 2;
                    // else if ($_SESSION["P_state"] == 2)
                    // {
                    //     $_SESSION["P_state"] = 3;
                    // }
                                    alert("test");
                temp = 1;
                // $("body").append("<p>You've pressed the enter key!</p>");
            }
        });
    </script>

</head>
<body>
    <div class = "header" id = "state_info">
        <h1>Pointer View</h1>
        <h2><?php 
        echo "Step ".$_SESSION['P_state'];
        ?></h2>
    </div>
    <div class = "content" id = "instruction">
        <!-- <p>Please wait for instructions</p> -->
        <p>
        <?php 
            if ($_SESSION["P_state"] == 0)
            {
                echo "Please wait for instructions!";
            }
            else if ($_SESSION["P_state"] == 1)
            {
                echo "Click Button to Start";
            }
            else if ($_SESSION["P_state"] == 2)
            {
                echo "#16";
            }
            else if ($_SESSION["P_state"] == 3)
            {
                echo "Round 1 Finished";
            }
            else if ($_SESSION["P_state"] == 4)
            {
                echo "STOP";
            }
            else if ($_SESSION["P_state"] == 5)
            {
                echo "Debug Model";
            }
        ?>
        </p>
    </div>

</body>
</html>
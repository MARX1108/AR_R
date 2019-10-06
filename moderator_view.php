<!DOCTYPE html>
<html>
<?php
    session_start();
    $_SESSION["P_state"] = 4;
    $_SESSION['O_state'] = 4;
    $_SESSION['trial_state'] = 0;
    $_SESSION['instruction_pointer'] = "Please wait for instructions!"
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

    <script>
        // setInterval(page_refresh, 1000);
    </script>

</head>
<body>
    <div class = "header" id = "state_info">
        <h1>Moderator View</h1>
        <h2><?php 
        echo "Step ".$_SESSION['trial_state'];
        ?></h2>
    </div>
    <form action="" method = "post">
    <div class = "content form-group" id = "instruction">
            <button type = "submit" class = "btn btn-primary btn-block btn-lg" name = "start"> start </button>
            <button type = "submit" class = "btn btn-primary btn-block btn-lg" name = "reset"> reset </button>
            <button type = "submit" class = "btn btn-primary btn-block btn-lg" name = "stop"> stop </button>
    </div>
    </form>



    <?php
                    if (isset($_POST['start'])) {
                        // start();    
                        $_SESSION['P_state'] = 1; 
                    }

                    if (isset($_POST['reset'])) {
                        start();    
                        $_SESSION["P_state"] = 0;
                        $_SESSION['O_state'] = 0;
                    }

                    if (isset($_POST['stop'])) {
                        // start();    
                        $_SESSION["P_state"] = 4;
                        $_SESSION['O_state'] = 4;
                    }


                    function start()
                    {
                        $i = 0;
                        while ( $i < 3)
                        {
                            $now = time();
                            $_SESSION["time"] = $now;

                            if (!isset($_SESSION['last_game_time'])
                            || (time() - $_SESSION['last_game_time']) > 45) {

                            // code to award points here

                            $_SESSION['last_game_time'] = time();
                            }


                            $i = $i+1;
                        }
                    }
    ?>

</body>
</html>
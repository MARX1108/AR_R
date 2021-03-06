<!DOCTYPE html>
<html>
<!-- <?php
    session_start();
    if (!isset($_SESSION["P_state"]))
    {
        $_SESSION["P_state"] = 4;
    }
    if (!isset($_SESSION["O_state"]))
    {
        $_SESSION["O_state"] = 4;
    }
    if (!isset($_SESSION["trial_state"]))
    {
        $_SESSION["trial_state"] = 0;
    }
    
?>

<head>
    <title>Moderator</title>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type = "text/css" href="css/moderator_view.css">

    <script>
        // setInterval(page_refresh, 1000);
    </script>

</head> -->
<body>
    <div class = "header" id = "state_info">
        <h1>Moderator View</h1>
        <!-- <h2><?php 
        // echo "P State: ".$_SESSION['P_state'];
        ?></h2>
        <h2><?php 
        // echo "O State: ".$_SESSION['O_state'];
        ?></h2> -->
    </div>
    <form action="" method = "post">
    <div class = "content" id = "instruction">
                <button type = "submit" id = "controller" name = 'start'> Start </button>
                <button type = "submit" id = "controller"name = 'reset'> Reset </button>
                <button type = "submit" id = "controller" name = 'stop'> Stop </button>
    </div>
    </form>



    <?php
                    if (isset($_POST['start'])) {
                        // start();    
                        $_SESSION['P_state'] = 1; 
                    }

                    if (isset($_POST['reset'])) {
                        $_SESSION["P_state"] = 0;
                        $_SESSION['O_state'] = 0;
                    }

                    if (isset($_POST['stop'])) {
                        // start();    
                        $_SESSION["P_state"] = 4;
                        $_SESSION['O_state'] = 4;
                    }

                    if(isset($_POST['action']) && !empty($_POST['action'])) {
                        $action = $_POST['action'];
                        switch($action) {
                            case 'test' : test();break;
                            case 'observer': observer();break;
                            // ...etc...
                        }
                    }
                    function test()
                    {
                        if ($_SESSION["P_state"] < 3)
                        {
                            $_SESSION["P_state"] = $_SESSION["P_state"] + 1;
                        }
                        
                    }
                    function observer()
                    {
                        if ($_SESSION["O_state"] < 4)
                        {
                            $_SESSION["O_state"] = $_SESSION["O_state"] + 1;
                        }
                    }

    ?>

</body>
</html>
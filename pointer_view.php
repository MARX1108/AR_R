<!DOCTYPE html>
<html>
<?php
        include("connection.php")
?>

<head>
    <title>Pointer View</title>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type = "text/css" href="css/pointer_view.css">
    <meta http-equiv="refresh" content="1" >
    <script  src = "./js/require.js"></script>
    <script  src = "./js/jquery-3.4.1.js"></script>
    <script>
        
        $(document).on("keypress", function(e){
            if(e.which == 13)
            {   
                $.ajax({ url: 'moderator_view.php',
                data: {action: 'test'},
                type: 'post',
                success: function(output) {
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
        <h1>Pointer View</h1>
        <h2><?php 
        echo "Step ".$_SESSION['P_state'];
        ?></h2>
    </div>
    <div class = "content" id = "instruction">

    
        <?php 

            if ($_SESSION["P_state"] == 0)
            {
                echo "<p id = 'main'> Please wait for instructions! \n </p>";
            }
            if ($_SESSION["P_state"] == 1)
            {
                echo "<p id = 'main'> Click ENTER to Start \n";
                $_SESSION['trial_state'] = 1;
            }
            else if ($_SESSION["P_state"] == 3)
            {
                echo "<p id = 'main'> Round 1 Finished \n </p>";
                echo "<p id = 'sub'> Please wait for Instruction!</p>";

            }
            else if ($_SESSION["P_state"] == 2)
            {
                echo " <h1 id = 'target_number'> #16 </h1>";
                echo "<p id = 'sub'> Click ENTER to proceed</p>";
            }
        ?>
        
    </div>
    
</body>
</html>
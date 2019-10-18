<body>
    <div class = "header" id = "state_info">
        <h1>Moderator View</h1>
    </div>
    <form action="" method = "post">
    <div class = "content" id = "instruction">
                <button type = "submit" id = "controller" name = 'start'> Start </button>
                <button type = "submit" id = "controller"name = 'reset'> Reset </button>
                <button type = "submit" id = "controller" name = 'stop'> Stop </button>
    </div>
    </form>



    <?php

                    $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
                    $initiate="UPDATE `state` SET `P_step`= 0" ; 
                    //$insert = "INSERT INTO `state`(P_step) VALUES (0);"; // uncomment it and only run it once

                    $query = mysqli_query($con, $initiate);

                    if (isset($_POST['start'])) {
                        $_SESSION['P_state'] = 1; 
                    }

                    if (isset($_POST['reset'])) {
                        $_SESSION["P_state"] = 0;
                        $_SESSION['O_state'] = 0;
                    }

                    if (isset($_POST['stop'])) {
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
                        $select = "SELECT `p_state` FROM `state`";
                        $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
                        
                        $result = mysqli_query($con, $select);
                        // while ($row = $result->fetch_assoc()) {
                        //     $db_p_step = $row["p_state"]; 
                        // }
                        while($row = mysqli_fetch_assoc($result)) {
                            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                        };

                        $newvalue = $db_p_step+1; 

                        $update="UPDATE `state` SET `P_step`= '$newvalue' " ; 
                        // $update = "update state set P_state='$newvalue'";
                        $updating = mysqli_query($con, $update);
                        // $con->close();

                        //-----------------------------------------
                        
                        // $select2 = "SELECT `P_step` FROM `state`";

                        // $_SESSION["P_state"] = $con->query($select2);

                        // if ($db_p_step < 3)
                        // {
                        //     // $db_p_step = $db_p_step + 1;
                        //     $update="UPDATE `state` SET `P_step`= [$db_p_step+1]" ; 
                        //     $query = mysqli_query($con, $update);
                        // }

                        // if ($_SESSION["P_state"] < 3)
                        // {
                        //     $_SESSION["P_state"] = $_SESSION["P_state"] + 1;
                        // }
                        
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
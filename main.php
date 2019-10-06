
<?php
    // session_write_close();
    session_start();

    // $P_state=0; 
    $_SESSION["P_state"] = 4;
    $_SESSION['O_state'] = 4;
    $_SESSION['trial_state'] = 0;

    // // session_write_close();
    // delay(1);
    // sleep(3);
    // $i = 0;
    // while($i < 2)
    // {
    //     $_SESSION['P_state'] = $_SESSION['P_state'] + 1;
    //     $_SESSION['O_state'] = $_SESSION['O_state'] + 1;
    //     $_SESSION['trial_state'] = $_SESSION['trial_state'] + 1;
    //     //sleep(2); 
    //     $i = $i + 1;
    // }


    // session_unset(); 
    // session_destroy(); 
?>

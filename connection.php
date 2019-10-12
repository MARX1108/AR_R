<?php
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

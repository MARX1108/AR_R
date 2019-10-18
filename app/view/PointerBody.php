<div class = 'content' id = 'instruction'>
    <?php
        global $test; 
        
        $stepzero="<p id = 'main'> countdown \n </p>";
        $stepone="<p id = 'main'> display a number \n </p>";
        $steptwo="<p id = 'main'> press any key to continue \n </p>";
        $stepthree="<p id = 'main'> round one is finished, please wait until pointer finished \n </p>";        

        $somenumber = $_SESSION["P_state"]; 

        switch ($somenumber) {
            case 0:
                $step = $stepzero; 
                break;
            case 1:
                $step = $stepone;
                break;
            case 2:
                $step = $steptwo;
                break;
            case 3:
                $step = $stepthree;
                break;
        } 

        define("TEST", $step, true);
        echo TEST; 


        $select = "SELECT `P_step` FROM `state`";
        $con = mysqli_connect("localhost", "root", "", "AR_R") or die("Connection was not established");
        
        $query = mysqli_query($con, $select);
        if ($row = $query->fetch_assoc()) {
            $testing = $row["P_step"]; 
        }

        echo $testing; 
    ?>

</div> 
</body>



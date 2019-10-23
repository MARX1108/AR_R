
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
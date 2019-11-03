<!DOCTYPE html>
<html>
<head>
    <title>Experiment Setup</title>
    <meta charset = 'utf-8'>
    <meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
    <meta name = 'viewport' content = 'width = device-width, initial-scale = 1'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
    <link rel='stylesheet' type = 'text/css' href='../../public/css/moderator_view.css'>
    <script src="../../public/js/moderator.js" > </script>

</head>

<body>
    <div class = 'signin-form'>
        <form action='' method = 'post'>
            <div class = 'header'>
                <h2> Moderator View</h2>
                <h3>Experiment Setup</h3>
            </div>
            <div class = 'form-group'>
                <!-- <p>Set virtual label of current experiment</p> -->
                <label> Virtual Type</label>
                <select class = 'form-control' name='virtual_type' required>
                    <option disabled = ''> Select Virtual Type</option>
                    <option>Real</option>
                    <option>AR</option>
                </select>
            </div>
            <div class = 'form-group'>
                <!-- <p>Set spatial label of current experiment</p> -->
                <label> Spatial Type</label>
                <select class = 'form-control' name='spatial_type' required>
                    <option disabled = ''> Select Spatial Type</option>
                    <option>face to face</option>
                    <option>side by side</option>
                </select>
            </div>

            

            <div class = 'form-group'>
                <label> Pointer ID</label>
                <input class = 'form-control' name = 'pointer_id' placeholder = 'pointer id' autocomplete = 'off required'>
            </div>

            <div class = 'form-group'>
                <label> Observer ID</label>
                <input class = 'form-control' name = 'observer_id' placeholder = 'observer id' autocomplete = 'off required'>
            </div>

            <div class = 'form-group'>
                <label> Session ID</label>
                <input class = 'form-control' name = 'session_id' placeholder = 'session_id (i.e. 1, 2, 3, 4)' autocomplete = 'off required'>
            </div>

            <div class = 'form-group'>
                <label> Experiment ID</label>
                <select class = 'form-control' name='experiment_id' required>
                    <option disabled = ''> Select Experiment Number </option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
            </div>


            <div class = 'form-group'>
                <label class = 'check-box-inline' > <input type='checkbox' name = 'rehearsal'> rehearsal </label>
            </div>
            
            <div class = 'form-group'>
                <button type = 'submit' class = 'btn btn-primary btn-block btn-lg' name = 'sign_up' "> Submit </button>
                <!-- <button class = 'btn btn-primary btn-block btn-lg' onclick="control('start')"> Start </button> -->
            </div>

            <?php include('../model/setup_user.php')?>
            </form>

     </div>

</body>
</html>
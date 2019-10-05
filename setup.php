<!DOCTYPE html>
<html>
<head>
    <title>starter</title>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type = "text/css" href="css/signin.css">
</head>
<body>
    <div class = "signin-form">
        <form action="" method = "post">
            <div class = "form-header">
                <h2> Moderator View</h2>
                <p>Experiment Setup</p>
            </div>
            <div class = "form-group">
                <p>Set virtual label of current experiment</p>
                <label> Virtual Type</label>
                <select class = "form-control" name="virtual_type" required>
                    <option disabled = ""> Select Virtual Type</option>
                    <option>Real</option>
                    <option>AR</option>
                </select>
            </div>

            <div class = "form-group">
                <p>Set spatial label of current experiment</p>
                <label> Spatial Type</label>
                <select class = "form-control" name="spatial_type" required>
                    <option disabled = ""> Select Spatial Type</option>
                    <option>f2f</option>
                    <option>sbs</option>
                </select>
            </div>

            <div class = "form-group">
                <label> subject one name</label>
                <input type="subject_1_name" class = "form-control" name = "subject_1_name" placeholder = "name" autocomplete = "off required">
            </div>

            <div class = "form-group">
                <label> subject two name</label>
                <input type="subject_2_name" class = "form-control" name = "subject_2_name" placeholder = "name" autocomplete = "off required">
            </div>


            <div class = "form-group">
                <label class = "check-box-inline"> <input type="checkbox"> rehearsal </label>
            </div>
            
            <div class = "form-group">
                <button type = "submit" class = "btn btn-primary btn-block btn-lg" name = "sign_up"> submit </button>
            </div>

            <?php include("setup_user.php")?>
            </form>
        <div class = "text-center small" style = "color: #67428B;     font-family: JosefinSans-Regular;"> Load Preset <a href="starter.php">sign in</a>
        </div>
     </div>

</body>
</html>
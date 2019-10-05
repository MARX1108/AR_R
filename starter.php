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
                <h2> Sign In </h2>
                <p>Login to ARR</p>
            </div>
            <div class = "form-group">
                <label> Email</label>
                <input type="email" class = "form-control" name = "email" placeholder = "someone@vt.edu" autocomplete = "off required">
            </div>

            <div class = "form-group">
                <label> Password</label>
                <input type="password" class = "form-control" name = "pass" placeholder = "Password" autocomplete = "off required">
            </div>
            <div class = "form-group">
                <button type = "submit" class = "btn btn-primary btn-block btn-lg" name = "sign_in"> Sign in </button>
            </div>

            <div class = "form-group">
                <button type = "submit" class = "btn btn-primary btn-block btn-lg" > <a href="signup.php" style = "color: #ffffff"> Next </button>
            </div>
            <!-- <?php include("setup_user.php")?> -->
        </form>

        
     </div>

</body>
</html>
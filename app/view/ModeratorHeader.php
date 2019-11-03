<!DOCTYPE html>
<html>

<head>
    <title>Moderator</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="<?= BASE_URL ?>/public/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../public/css/moderator_view.css">
    <script src="../../public/js/moderator.js" > </script>
</head>

<body>
    <div class="header" id="state_info">
        <h1>Moderator View</h1>
        <h2>Trial <a id = "trial"></a></h2>
        <h2>Pointer Step <a id = "pointer_step"></a></h2>
        <h2>Observer Step <a id = "observer_step"></a></h2>
    </div>

    <div class="content" id="instruction">
        <a id="controller" href="../view/setup.php" style="text-decoration: none;"> Start </a>
        <button type = 'submit'  id="controller" onclick="control('reset')"> Reset </button>
        <!-- <button type = "submit" id = "controller" name = 'stop'> Stop </button> -->
    </div>

</body>

</html>
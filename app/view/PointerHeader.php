<!DOCTYPE html>
<html>
<?php
    session_start();
    include 'include/connection.php';
?>

<head>
    <title>Pointer View</title>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type = "text/css" href="../../public/css/pointer_view.css">
    <!-- <meta http-equiv="refresh" content="1" > -->
    <!-- <script  src = "../../public/js/require.js"></script> -->
    <script  src = "../../public/js/jquery-3.4.1.js"></script>
    <script src="<?= BASE_URL ?>/public/js/jquery-3.4.1.min.js"></script>
	<!-- <script src="<?= BASE_URL ?>/public/js/scripts.js"></script> -->
    <script src="../../public/js/pointer.js"></script>
</head>

<body>
    <div id='div_session_write'> 

    </div>
    <div class = "header" id = "state">
        <h1>Pointer View</h1>
        <h2></h2>
    </div>
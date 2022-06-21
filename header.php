<?php
session_start();

// // print_r($_SESSION);

// if (!isset($_SESSION["user"])) {
//     die("jackson");
//     //header("Location: ./login.php");
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <div class="container">

        <nav>
            <ul>
                <li><a href="index.php">index</a></li>
                <li><a href="portafolio.php">Portafolio</a></li>
                <li><a href="logOut.php">log Out</a></li>
            </ul>
        </nav>
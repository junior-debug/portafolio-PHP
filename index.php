<?php
if (!isset($_SESSION["user"])) {
    header("Location: ./login.php");
}

include 'header.php';

//session_start();

?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Bienvenidos</h1>
        <p class="lead">Este es un portafolio privado</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
        </p>
    </div>
</div>

<?php include 'footer.php'; ?>
<?php
include 'header.php';
include 'conexion.php';

if (isset($_SESSION["user"])) {
    echo "se creo la sesion";
    print_r($_SESSION);
} else {
    header("Location: login.php");
}

$objConexion = new conexion();
$res = $objConexion->getConsulta("SELECT * FROM `proyecto`");
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

<?php foreach ($res as $key => $value) { ?>

    <div class="card-group">
        <div class="card">
            <img src="imagenes/<?php echo $value['imagen'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $value['nombre'] ?></h5>
                <p class="card-text"><?php echo $value['descripcion'] ?></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>

<?php } ?>
<?php include 'footer.php'; ?>
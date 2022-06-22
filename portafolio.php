<?php
include 'header.php';
include 'conexion.php';
?>
<?php
if ($_POST) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fecha = new DateTime();
    $imagen = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name'];
    $imagen_temporal = $_FILES['imagen']['tmp_name'];

    move_uploaded_file($imagen_temporal, "imagenes/" . $imagen);

    $objConexion = new conexion();
    $sql = "INSERT INTO `proyecto` ( `nombre`, `imagen`, `descripcion`) VALUES ( '$nombre', '$imagen', '$descripcion'); ";
    $objConexion->getConexion($sql);
    header("location:portafolio.php");
}

if ($_GET) {
    $id = $_GET;
    $string = implode(";", $id);
    $objConexion = new conexion();
    $imagen = $objConexion->getConsulta("SELECT imagen FROM `proyecto` WHERE id= $string");
    unlink("imagenes/" . $imagen[0]['imagen']);
    $sql = "DELETE FROM proyecto WHERE `proyecto`.`id` = " . $string;
    $objConexion->getConexion($sql);
    header("location:portafolio.php");
}

$objConexion = new conexion();
$res = $objConexion->getConsulta("SELECT * FROM `proyecto`");

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del Proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data" style="display: flex; flex-direction:column;justify-content: center;align-items: center;">
                        <label for="proyecto">
                            Nombre del Proyecto:
                            <input required type="text" name="nombre" id="proyecto" class="form-control">
                        </label>
                        <label for="imagen">
                            Imagen del Proyexto:
                            <input required type="file" name="imagen" id="imagen" class="form-control">
                        </label>
                        <div class="mb-3">
                            <label for="" class="form-label">
                                Descripcion:
                                <textarea required class="form-control" name="descripcion" id="" rows="3"></textarea>
                            </label>
                        </div>
                        <input type="submit" value="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($res as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['nombre'] ?></td>
                            <td> <img width="100" src="imagenes/<?php echo $value['imagen'] ?>" alt=""> </td>
                            <td><?php echo $value['descripcion'] ?></td>
                            <td>
                                <a href="#" class="btn btn-primary">Editar</a>
                                <a href="?borrar = <?php echo $value['id']; ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>
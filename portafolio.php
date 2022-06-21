<?php
include 'header.php';
include 'conexion.php';
?>
<?php
if ($_POST) {
    $nombre = $_POST['nombre'];

    $objConexion = new conexion();
    $sql = "INSERT INTO `proyecto` ( `nombre`, `imagen`, `descripcion`) VALUES ( '$nombre', 'imagen.jpg', 'proyecto de php'); ";
    $objConexion->getConexion($sql);
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
                    <form action="portafolio.php" method="post" style="display: flex; flex-direction:column;justify-content: center;align-items: center;">
                        <label for="proyecto">
                            Nombre del Proyecto:
                            <input type="text" name="nombre" id="proyecto" class="form-control">
                        </label>
                        <label for="imagen">
                            Imagen del Proyexto:
                            <input type="file" name="imagen" id="imagen" class="form-control">
                        </label>
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
                            <td><img src="<?php echo $value['imagen'] ?>" alt=""></td>
                            <td><?php echo $value['descripcion'] ?></td>
                            <td>
                                <a href="#" class="btn btn-primary">Editar</a>
                                <a href="#" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>
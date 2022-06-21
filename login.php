<?php
include 'header.php';

//session_start();

if (isset($_POST["user"]) && isset($_POST["password"])) {

    if ($_POST["user"] == "junior" && $_POST["password"] == "123456") {
        $_SESSION["user"] = "junior";
        header("Location: index.php");
    } elseif ($_POST["user"] != "junior" && $_POST["password"] != "123456") {
        echo "<script> alert('usuario o contraseña incorrecta') </script>";
    }
}
?>

<div class="card">
    <div class="card-header">
        Iniciar sesión
    </div>
    <div class="card-body" style="display:flex ; justify-content:center;">
        <form action="login.php" method="post" style="display: flex; justify-content: center; align-items: center;flex-direction: column;">

            <label for="usuario">
                User:
                <input type="text" name="user" id="usuario" class="form-control">
            </label>
            <br>
            <label for="contraseña">
                Password:
                <input type="password" name="password" id="contraseña" class="form-control">
            </label>

            <br>

            <input type="submit" value="submit" class="btn btn-success">

        </form>
    </div>

</div>

<?php include 'footer.php'; ?>
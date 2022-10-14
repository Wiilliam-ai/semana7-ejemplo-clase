<?php

require "./dao/entidad/alumno.class.php";
require "./dao/AlumnoDao.php";
$alumno = new Alumno();
$alumnoDao = new AlumnoDao();

$nombre = "";
$apellido = "";
$edad = "";
$error = null;

if (isset($_POST["btnRegistrar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];

    if (!trim($nombre) || !trim($apellido) || !trim($edad)) {
        $error = "Todos los campos deben estar completos";
    }

    if(!$error){
        $alumno->setNombre($nombre);
        $alumno->setApellido($apellido);
        $alumno->setEdad($edad);
        $alumnoDao->insert($alumno);
        header("location: alumno.php");
    }

}


include "./templates/header.php"; ?>
    <h2 class="my-4 fs-4 text-center">Agrega un nuevo Alumno</h2>
    <form method="POST" class="border border-3 p-3 rounded mx-auto" style="max-width: 500px;">
        <?php if ($error !== null) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Ingrese el nombre " 
                id="nombre" 
                name="nombre" value="<?php $nombre; ?>">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" placeholder="Ingrese el apellido" 
                id="apellido" 
                name="apellido" value="<?php $apellido; ?>">
        </div>
        
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" placeholder="Ingrese la edad" 
                id="edad" 
                name="edad" value="<?php $edad; ?>">
        </div>

        <button type="submit" name="btnRegistrar" class="btn btn-primary">Registrar Cliente</button>
    </form>
<?php include "./templates/footer.php"; ?>
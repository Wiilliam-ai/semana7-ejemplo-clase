<?php
require "./dao/AlumnoDao.php";
require "./dao/entidad/alumno.class.php";

$alumnoDao = new AlumnoDao();
$alumno = new Alumno();

if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $objetoAlumno = $alumnoDao->select($id);
}
if ($_POST) {
    $idAlumno = $_POST["idAlumno"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];

    $alumno->setId($idAlumno);
    $alumno->setNombre($nombre);
    $alumno->setApellido($apellido);
    $alumno->setEdad($edad);
    $alumnoDao->update($alumno);
    header("location: alumno.php");
}

include "./templates/header.php"; ?>
    <h2 class="my-4 fs-4 text-center">Actualiza los datos del alumno</h2>
    <form method="POST" class="border border-3 p-3 rounded mx-auto" style="max-width: 500px;">
        <input type="hidden" name="idAlumno" value="<?php echo $objetoAlumno->id; ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Ingrese el nombre " 
                id="nombre" 
                name="nombre" value="<?php echo $objetoAlumno->nombres; ?>">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" placeholder="Ingrese el apellido" 
                id="apellido" 
                name="apellido" value="<?php echo $objetoAlumno->apellidos; ?>">
        </div>
        
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" placeholder="Ingrese la edad" 
                id="edad" 
                name="edad" value="<?php echo $objetoAlumno->edad; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
    </form>
<?php include "./templates/footer.php"; ?>
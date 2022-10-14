<?php
require "./dao/AlumnoDao.php";
$alumnoDao = new AlumnoDao();
$lista = $alumnoDao->select(0);

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $alumnoDao->delete($id);
    header("location: alumno.php");
}

include "./templates/header.php"; ?>
    <h2 class="my-4 fs-4 text-center">Area de mantenimiento de Alumno</h2>
    <div class="mb-2 d-flex justify-content-center mx-auto">
        <a href="./crear_alumno.php" class="btn btn-dark">Registrar Alumno</a>
    </div>
    <div class="mx-auto" style="max-width: 550px;">
        <table id="tablaAlumno"  class="table m-auto">
            <thead class="table-dark">
                <tr>
                    <!--- <th>ID</th> --->
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $key => $value):?>
                    <tr>
                        <td><?php echo $value->nombres; ?></td>
                        <td><?php echo $value->apellidos; ?></td>
                        <td><?php echo $value->edad; ?></td>
                        <td class="d-flex justify-content-evenly">
                            <a href="editar_alumno.php?id=<?php echo $value->id;?>" class="btn btn-warning">Editar</a>
                            <form action="./alumno.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $value->id;?>">
                                <input class="btn btn-danger" name="btnEliminar" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>

            </tbody>
        </table>
    </div>

    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript">
        
    </script>
    <script>
        const tabla = document.querySelector("#tablaAlumno");
        const table = new DataTable(tabla);
    </script>

<?php include "./templates/footer.php"; ?>




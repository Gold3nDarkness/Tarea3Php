<?php
include 'layout\header.php';
include 'layout\footer.php';
include 'helpers\utilities.php';

session_start();

$_SESSION['Estudiantes'] = isset($_SESSION['Estudiantes']) ? $_SESSION['Estudiantes'] : array();

$listadoEstudiantes = $_SESSION['Estudiantes'];

if (!empty($listadoEstudiantes)) {

    if (isset($_GET['carreraId'])) { 

        $listadoEstudiantes = searchProperty($listadoEstudiantes, 'carreraId', $_GET['carreraId']); 

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiantes</title>
</head>

<body>

    <?php printHeader(); ?>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Estudiantes</h1>
                <p class="lead text-muted">Listado de Estudiantes</p>
                <p>
                    <a href="Estudiantes/add.php?page=true" class="btn btn-primary my-2"><i class="fa fa-plus-square"></i> Agregar nuevo Estudiante</a>
                </p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    <div class="col-md-6"></div>

                    <div class="col-md-6">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="index.php?carreraId=1" class="btn btn-secondary">Redes</a>
                        <a href="index.php?carreraId=2" class="btn btn-secondary">Software</a>
                        <a href="index.php?carreraId=3" class="btn btn-secondary">Multimedia</a>
                        <a href="index.php" class="btn btn-secondary">TODOS</a>
                        <a href="index.php?carreraId=4" class="btn btn-secondary">Mecatronica</a>
                        <a href="index.php?carreraId=5" class="btn btn-secondary">Seguridad Informatica</a>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php if (empty($listadoEstudiantes)) : ?>

                        <h2>No hay Estudiantes registrado, <a href="Estudiantes/add.php?page=true" class="btn btn-primary my-2"><i class="fa fa-plus-square"></i> Agregar nuevo Estudiante</a> </h2>

                    <?php else : ?>

                        <?php foreach ($listadoEstudiantes as $estudiante) : ?>

                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">

                                    <div class="card-body">
                                        <p class="card-text"><strong> <?php echo $estudiante['name'] ." ".$estudiante['apellido']; ?> </strong><br>
                                        <?php echo carrera($estudiante) . " Estado: " . $estudiante['status'] ;?>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="Estudiantes/edit.php?page=true&id=<?php echo $estudiante['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                                            </div>
                                            <div class="btn-group">
                                                <a href="Estudiantes/delete.php?page=true&id=<?php echo $estudiante['id'] ?>" class="btn btn-sm btn-outline-secondary">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
    </main>

    <?php printFooter(); ?>

</body>

</html>
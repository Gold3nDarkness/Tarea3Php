<?php
include '../layout\header.php';
include '../layout\footer.php';
include '../helpers\utilities.php';

session_start();

$estudiantes = $_SESSION['Estudiantes'];

$containId = isset($_GET['id']); 

$element = [];

if ($containId) {

    $element = searchProperty($estudiantes, 'id', $_GET['id'])[0]; 
    $elementIndex = getIndexElement($estudiantes, 'id', $_GET['id']); 

}

if (isset($_POST['Eliminar'])) { 
    if($_POST['Eliminar']=="Si"){
        unset($estudiantes[$elementIndex]);
     $estudiantes=array_values($estudiantes);
    }
    $_SESSION['Estudiantes'] = $estudiantes; 
   $_SESSION['Estudiantes']=array_values($_SESSION['Estudiantes']);
    header("Location: ../index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar Estudiante</title>
</head>

<body>

    <?php printHeader(); ?>

    <main role="main">

        <?php if ($containId && !empty($element)) : ?>

            <div class="card">
                <div class="card-header">
                    <a href="../index.php" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Volver atras </a> Eliminando al Estudiante <strong><?php echo $element['name']." ". $element['apellido'] ?></strong>
                </div>
                <div class="card-body">
               
                <p class="card-text"><strong> <?php echo $element['name'] ." ".$element['apellido']; ?> </strong><br>
                    <?php echo carrera($element) . " Estado: " . $element['status'] ;?>
                </p>

                    <form method="POST" action="delete.php?id=<?php echo $element["id"] ?>">
                    <div class="col-md-4">
                        <div class="form-group">

                        <label for="Eliminar"> Desea eliminar: </label><br>
                            <input class="Eliminar" type="radio" name="Eliminar" id="Eliminar" value="No">No<br>
                            <input class="Eliminar" type="radio" name="Eliminar" id="Eliminar" value="Si">Si<br>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Proceder</button>
                    </form>

                </div>
            </div>

        <?php else : ?>

            <h2>No existe</h2>

        <?php endif; ?>

    </main>

    <?php printFooter(); ?>

</body>

</html>
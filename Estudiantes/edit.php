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
    
    $selectedRedes = ($element['carreraId'] == 1) ? "selected" : ""; 
     $selectedSoftware = ($element['carreraId'] == 2) ? "selected" : ""; 
     $selectedMultimedia = ($element['carreraId'] == 3) ? "selected" : ""; 
    $selectedMecatronica = ($element['carreraId'] == 4) ? "selected" : ""; 
    $selectedSeguridadInformatica = ($element['carreraId'] == 5) ? "selected" : ""; 

    $selectedActivo=($element['status'] == "Activo") ? "checked" : ""; 
    $selectedInactivo=($element['status'] == "Inactivo") ? "checked" : ""; 
}

if (isset($_POST['name']) && isset($_POST['carreraId'])) { 

    $updateEstudiantes = ['id' => (int)$_GET['id'], 'name' =>$_POST['name'],'apellido'=>$_POST['apellido'],'status'=>$_POST['status'],'carreraId' => $_POST['carreraId']];

    $estudiantes[$elementIndex] =  $updateEstudiantes; 

    $_SESSION['Estudiantes'] = $estudiantes; 

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
    <title>Editar Estudiante</title>
</head>

<body>

    <?php printHeader(); ?>

    <main role="main">

        <?php if ($containId && !empty($element)) : ?>

            <div class="card">
                <div class="card-header">
                    <a href="../index.php" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Volver atras </a> Editando al Estudiante <strong><?php echo $element['name']." ". $element['apellido'] ?></strong>
                </div>
                <div class="card-body">

                    <form method="POST" action="edit.php?id=<?php echo $element["id"] ?>">

                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="InputName">Nombre</label>
                                <input type="text" value="<?php echo $element['name'] ?>" name="name" class="form-control" id="InputName" placeholder="Introduzca el nombre ">

                            </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="InputApellido">Apellido</label>
                            <input type="text" value="<?php echo $element['apellido'] ?>" name="apellido" class="form-control" id="InputApellido" placeholder="Introduzca el apellido ">

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">

                        <label for="estado"> Estado </label><br>
                            <input class="estado" type="radio" name="status" id="estado" value="Activo" <?php echo $selectedActivo; ?>>Activo<br>
                            <input class="estado" type="radio" name="status" id="estado" value="Inactivo" <?php echo $selectedInactivo; ?>>Inactivo<br>
                        </div>
                    </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="carrera"> Carrera </label>
                                <select name="carreraId" class="form-control" id="carrera">
                                    <option <?php echo $selectedRedes; ?> value="1">Redes</option>
                                    <option <?php echo $selectedSoftware; ?> value="2">Software</option>
                                    <option <?php echo $selectedMultimedia; ?> value="3">Multimedia</option>
                                    <option <?php echo $selectedMecatronica; ?> value="4">Mecatronica</option>
                                    <option <?php echo $selectedSeguridadInformatica; ?> value="5">Seguridad Informatica</option>



                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
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
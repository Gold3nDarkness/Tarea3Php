<?php

include '../layout\header.php';
include '../layout\footer.php';
include '../helpers\utilities.php';

session_start();

if(isset($_POST['name']) && isset($_POST['carreraId'])){
    
  
    $estudiantes = $_SESSION['Estudiantes'];

    $estudianteId = 1;

    if(!empty($estudiantes)){
        $lastElement = getLastElement($estudiantes); 
         $estudianteId =  $lastElement["id"] + 1;
    }
if($_POST['name']!=""&&$_POST['apellido']!=""){

        array_push($estudiantes, ["id" => $estudianteId,"name" =>$_POST['name'],"apellido"=>$_POST['apellido'],"status"=>$_POST['status'],"carreraId" => $_POST['carreraId'] ]);//Agregamos el Estudiante al listado de estudiantes

}
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
    <title>Agregar Estudiante</title>
</head>

<body>

    <?php printHeader(); ?>

    <main role="main">

        <div class="card">
            <div class="card-header">
               <a href="../index.php" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Volver atras </a> Registra Estudiante
            </div>
            <div class="card-body">

                <form method="POST" action="add.php">

                    <div class="col-md-4">
                        <div class="form-group">

                            <label for="InputName">Nombre</label>
                            <input type="text" name="name" class="form-control" id="InputName" placeholder="Introduzca el nombre ">

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">

                            <label for="InputApellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control" id="InputApellido" placeholder="Introduzca el apellido ">

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group" style="display:none">
                       

                        <label for="estado"> Estado </label>
                            <br>
                            <input class="estado" type="radio" name="status" id="estado" value="Activo" checked>Activo<br>
                            <input class="estado" type="radio" name="status" id="estado" value="Inactivo">Inactivo<br>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="carreraId"> Carrera </label>
                            <select name="carreraId" class="form-control" id="carreraId">
                                <option value="1">Redes</option>
                                <option value="2">Software</option>
                                <option value="3">Multimedia</option>
                                <option value="4">Mecatronica</option>
                                <option value="5">Seguridad Informatica</option>
                                
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Crear</button>
                </form>

            </div>
        </div>

    </main>

    <?php printFooter(); ?>

</body>

</html>
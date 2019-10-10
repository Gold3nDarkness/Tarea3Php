<?php

/* Esta funcion retorna el ultimo elemento del un array */
function getLastElement($list)
{
    $countList = count($list);
    $lastElement = $list[$countList - 1];

    return $lastElement;
}

/* Esta funcion realiza una busqueda en un listado por la propiedad y valor que pasemos por parametros
   Retorna: Un listado con el filtro que realizamos */
function searchProperty($list, $property, $value)
{
    $filter = [];

    foreach ($list as $item) {

        if ($item[$property] == $value) {
            array_push($filter, $item);
        }
    }

    return $filter;
}

/* Esta funcion realiza una busqueda en un listado por la propiedad y valor que pasemos por parametros
   Retorna: El index del primer elemento que cumpla con la condicion de busqueda */
function getIndexElement($list, $property, $value)
{
    $index = 0;
    $i = 0;
    foreach ($list as $item) {

        if ($item[$property] == $value) {
            $index = $i;
            break;
        }
        $i++;
    }
    return $index;
}
function Carrera($estudiante){
    if($estudiante['carreraId']==1){
        return "Redes";
    }
    else if($estudiante['carreraId']==2){
        return "Software";
    }
    else if($estudiante['carreraId']==3){
        return "Multimedia";
    }
    else if($estudiante['carreraId']==4){
        return "Mecatronica";
    }
    else if($estudiante['carreraId']==5){
        return "Seguridad Informatica";
    }
    else{
        return "nbsp;";
    }
    }
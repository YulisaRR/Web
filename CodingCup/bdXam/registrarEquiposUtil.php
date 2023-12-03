<?php
 $comprobarDatos = true;
include('Conexion.php');
    $valNombreEquipo = $valEstudiante1 = $valEstudiante2 = $valEstudiante3 = "";
    if (count($_POST) > 0) {
        $valNombreEquipo = $valEstudiante1 = $valEstudiante2 = $valEstudiante3 = "is-invalid";
        $valido = true;

        //validar Nombre equipo
        if (
            isset($_POST["nombreEquipo"]) && (strlen(trim($_POST["nombreEquipo"])) > 10 && strlen(trim($_POST["nombreEquipo"])) < 25) &&
            preg_match("/^[a-zA-Z.\s]+$/", $_POST["nombreEquipo"])
        ) {
            $valNombreEquipo = "is-valid";
            $equipoNombre = $_POST["nombreEquipo"];
        } else {
            $valido = false;
        }
        //Validar nombre del estudiante 1
        if (
            isset($_POST["EstudianteUno"]) && (strlen(trim($_POST["EstudianteUno"])) > 10 && strlen(trim($_POST["EstudianteUno"])) < 30) &&
            preg_match("/^[a-zA-Z.\s]+$/", $_POST["EstudianteUno"])
        ) {
            $valEstudiante1 = "is-valid";
            $estudiante1 = $_POST["EstudianteUno"];
        } else {
            $valido = false;
        }        
        //Validar nombre del estudiante 2
        if (
            isset($_POST["EstudianteDos"]) && (strlen(trim($_POST["EstudianteDos"])) > 10 && strlen(trim($_POST["EstudianteDos"])) < 30) &&
            preg_match("/^[a-zA-Z.\s]+$/", $_POST["EstudianteDos"])
        ) {
            $valEstudiante2 = "is-valid";
            $estudiante2 = $_POST["EstudianteDos"];
        } else {
            $valido = false;
        }        
        //Validar nombre del estudiante 3
        if (
            isset($_POST["EstudianteTres"]) && (strlen(trim($_POST["EstudianteTres"])) > 10 && strlen(trim($_POST["EstudianteTres"])) < 30) &&
            preg_match("/^[a-zA-Z.\s]+$/", $_POST["EstudianteTres"])
        ) {
            $valEstudiante3 = "is-valid";
            $estudiante3 = $_POST["EstudianteTres"];
        } else {
            $valido = false;
        }
        //REGISTRAR
        if($valido){
            //Se realiza la consulta para agregar un equipo
            $consulta ="INSERT INTO equipos (nombreEquipo, estudiante1, estudiante2, estudiante3)
            VALUES('$equipoNombre', '$estudiante1', '$estudiante2', '$estudiante3')";
            $resultado  = mysqli_query($conexion, $consulta);
            if ($resultado) {
                $comprobarDatos = true;
                mysqli_close($conexion);
                echo "<script>window.location='PaginaPrincipalCoach.php'</script>";
            } else {
                
                
            }
        }
        

    }
    
    


?>
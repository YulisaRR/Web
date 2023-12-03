<?php
    include('Conexion.php');
    include('modelos/concurso.php');
    
    $valNombreEvento = $valFechaInicio = $valFechaFinalizacion = "" ;
    $comprobarDatos = false;
    $concurso=new concurso();



    function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }


    if (count($_POST) > 0) {

    $valNombreEvento = $valFechaInicio = $valFechaFinalizacion = "is-invalid" ;
    $valido = true;

/*
    if (count($_POST) > 0) {
        $valNombreEvento = $valFechaInicio = $valFechaFinalizacion = "is-invalid" ;
        $valido = true;

        // Validación del nombre
        if (
            isset($_POST["Nombre"]) && (strlen(trim($_POST["Nombre"])) > 3 && strlen(trim($_POST["Nombre"])) < 50) &&
            preg_match("/^[a-zA-Z.\s]+$/", $_POST["Nombre"])
        ) {
            $valNombre = "is-valid";
            $nombre = ($_POST["Nombre"]);
        } else {
            $valido = false;
        }

        // Validación de la fecha de inicio
        if (isset($_POST["FechaInicio"])) {
            $valFechaInicio = "is-valid";
            $fechaInicio = ($_POST["FechaInicio"]);
        } else {
            $valido = false;
        }

        // Validación de la fecha de finalización
        if (isset($_POST["FechaFinalizacion"])) {
            $valFechaFinalizacion = "is-valid";
            $fechaFinalizacion = ($_POST["FechaFinalizacion"]);
        } else {
            $valido = false;
        }




        if ($valido) {
            $consulta = "INSERT INTO concurso (nombre, fechaInicio, fechaFin, estado)
                        VALUES('$nombre', '$fechaInicio', '$fechaFinalizacion', 'Activo')";
            $resultado  = mysqli_query($conexion, $consulta);
            if ($resultado) {
                $comprobarDatos = true;
                mysqli_close($conexion);
                
            } else {
                $comprobarDatos = false;
                
            }
        }
    }*/

    

    

    // Validación del nombre
    if(ISSET($_POST["Nombre"]) &&  (strlen(trim($_POST["Nombre"]))>3 && strlen(trim($_POST["Nombre"]))<51) &&
      preg_match("/^[a-zA-Z.\s]+$/",$_POST["Nombre"])){
      $valNombre="is-valid";
    }else{
      $valido=false;
     }

    if(ISSET($_POST["FechaInicio"]) && validateDate($_POST["FechaInicio"])){
        $fNac=DateTime::createFromFormat('Y-m-d', $_POST["FechaInicio"]);
        $h = new DateTime();
        $dif1 = $h->diff($fNac)->y;
        if($dif1>=18)
            $valFechaNac="is-valid";
    }else{
        $valido=false;
    }

    if(ISSET($_POST["FechaFinalizacion"]) && validateDate($_POST["FechaFinalizacion"])){
        $fNac=DateTime::createFromFormat('Y-m-d', $_POST["FechaFinalizacion"]);
        $h = new DateTime();
        $dif2= $h->diff($fNac)->y;
        if($dif2>=18)
            $valFechaNac="is-valid";
    }else{
        $valido=false;
    }

    $concurso->nombre=ISSET($_POST["Nombre"])?trim($_POST["Nombre"]):"";
    $concurso->fechaInicio=ISSET($_POST["FechaInicio"])?DateTime::createFromFormat('Y-m-d', $_POST["FechaInicio"]):new DateTime();
    $concurso->fechaFin=ISSET($_POST["FechaFinalizacion"])?DateTime::createFromFormat('Y-m-d', $_POST["FechaFinalizacion"]):new DateTime();


    if($valido){
    
        $sql = "INSERT INTO concurso
        (nombre,
        fechaInicio,
        fechaFin,
        estado)
        VALUES
        (:nombre,
        :fechaInicio,
        :fechaFin,
        :'Activo');";

     $resultado  = mysqli_query($conexion, $sql);
        if ($resultado) {
            $comprobarDatos = true;
            mysqli_close($conexion);
            
        } else {
            $comprobarDatos = false;
            
        }
    
    
    }}
/*
    function agregar(concurso $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO concurso
                (
                nombre,
                fechaInicio,
                fechaFin,
                estado)
                VALUES
                (:nombre,
                :fechaInicio,
                :fechaFin,
                :'Activo');";
                
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(array(
                    ':nombre'=>$obj->nombre,
                    ':fechaInicio'=>$obj->fechaInicio->format('Y-m-d'),
                    ':fechaFin'=>$obj->fechaFin->format('Y-m-d'),
                    ':estado'=>$obj->estado
                    )              
                );
                 
            $clave=$this->conexion->lastInsertId();
            return $clave;
		} catch (Exception $e){
			return $clave;
		}finally{         
            Conexion::desconectar();
        }
	
    }
    }*/


?>
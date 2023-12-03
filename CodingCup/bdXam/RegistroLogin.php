<?php
  //  require 'Conexion.php';
    include ('Conexion.php');
    // require_once '../Registrar.php';

     $comprobarDatos="correctos";
     $valCorreo = $valContrasena = "";
    if(count($_POST)>0){
        $valCorreo = $valContrasena = "is-invalid";
        $valido = true;            

                
    // Validación del correo
    if(ISSET($_POST["Email"]) && 
    filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL)){
    $valCorreo="is-valid";
    }else{
        $valido=false;
    }            
    //Validacion contraseña
    if(ISSET($_POST["Contrasena"])){
      $valContrasena="is-valid";
    }else{
      $valido=false;
    }                  
    if($valido){
        $Correo = $_POST['Email'];
        $Password = $_POST['Contrasena'];
     //   $Tipo = $_POST['usuario'];

        $consulta = "SELECT * FROM usuarios WHERE correo='$Correo' AND password='$Password'"; //llamamos al usuario en la tabla con correo y contra
        $resultado  = mysqli_query($conexion,$consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) { //verificamos los datos 
            // Verifica que el tipo de usuario sea 'Administrador', 'Coach' o 'Auxiliar'
            if ($fila["tipo"] == 'Administrador') {// y comparamos si tipo es igual a tipo de usuario 
                header("location: PaginaAdmin.php ") ;
            } else if($fila["tipo"] == 'Coach'){
              header("location: PaginaPrincipalCoach.php ");
            } 
        }else{
            //AGREGAR UNA FORMA DE COMUNICAR QUE HUBO ERROR
            $comprobarDatos="incorrectos";
        }
    }
}
?>
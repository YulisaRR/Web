<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal del Coach</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <?php
  include("bdXam/Conexion.php");

  $consulta = "SELECT id, nombreEquipo, estudiante1, estudiante2, estudiante3 FROM equipos";
  $resultado  = mysqli_query($conexion, $consulta);

    

  ?>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <img src="img/icno.png" alt="codig cup"  width="90px" > <a href="index.php"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-3g-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!--CONTENIDO-->
      <h1>!Bienvenido Coach¡</h1>
      <div id="contenido" class="container mt-3">
      <a href="RegistroEquipos.php" class="btn btn-success">Agregar</a>
          <table id="lista" class="table table-striped table-bordered">
            <thead>
                <tr><th>Clave</th><th>Nombre del equipo</th><th>Estudiante 1</th><th>Estudiante 2</th><th>Estudiante 3</th><th>Operaciones</th></tr>
            </thead>
            <tbody> 
                <?php
                  if ($resultado) {
                    // Inicializar un arreglo para almacenar los datos
                    $datosEquipos = array();
                
                    // Recorrer los resultados y almacenar en el arreglo
                    while ($fila = mysqli_fetch_array($resultado)) {
                        $datosEquipos[] = $fila;
                    }
                
                    foreach ($datosEquipos as $equipo) {
                      echo '<tr>';
                      echo '<td>' . $equipo['id'] . '</td>';
                      echo '<td>' . $equipo['nombreEquipo'] . '</td>';
                      echo '<td>' . $equipo['estudiante1'] . '</td>';
                      echo '<td>' . $equipo['estudiante2'] . '</td>';
                      echo '<td>' . $equipo['estudiante3'] . '</td>';
                      echo "<td><form method='post'>".
                      "<button  class='btn btn-primary' name='id' value='".$equipo['id']."'>Editar</button>".
                      "<button type='button' class='btn btn-danger' onclick='confirmar(this)' name='id' value='".$equipo['id']."'>Eliminar</button>".
                    "</form></td></tr>";
                    }
          
                  
                    //Cerramos conexion
                    mysqli_close($conexion);
                  }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal" id="mdlConfirmacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Confirmar eliminación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Está a punto de eliminar a <strong id="spnPersona"></strong> 
               ¿Desea continuar?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <form method="post">
              <button class="btn btn-danger" data-bs-dismiss="modal" id="btnConfirmar" name="id">Si, continuar con la eliminación</button>
            </form>
          </div>
        </div>
      </div>
    </div>

      <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    <script src="JavaScript/PaginaCoach.js"></script>
</body>
</html>

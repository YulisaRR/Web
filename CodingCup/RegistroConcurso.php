<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/estiloRegistroConcurso.css">
    <script src="JavaScrip/bootstrap.bundle.min.js"></script>
</head>
<body>

    <?php
      require_once('bdXam/RegistroConcursoUtil.php');
    ?>

    <form action="" method="post" class="row mx-auto g-3" style="width: 30%;">
    <h3 >Registrar concurso</h3>

    <?php
        if ($comprobarDatos) {
            echo "<script>window.location='RegistroExitoso.php'</script>";
            $comprobarDatos = false;
        }
    ?>
    
    <div class="">
        <label for=" txtNombreEvento" class="form-label">Nombre del evento</label>
        <input type="text" id="txtNombreEvento" name="Nombre" class="form-control <?= $valNombreEvento ?>
        " placeholder="Nombre evento" required value="<?php echo isset($_POST["NombreEvento"]) ? $_POST["NombreEvento"] : "" ?>">
            <div class="invalid-feedback">
                <ul>
                    <li>El nombre es obligatorio</li>
                    <li>Debe contener solo letras</li>
                    <li>Debe tener entre 5 y 25 caracteres</li>
                </ul>
            </div>
    </div>

    <div>
        <label for="txtFechaInicio" class="form-label">Fecha de inicio</label>
        <input type="date" id="txtFechaInicio"  class="form-control <?= $valFechaInicio ?>
        " required value="<?php echo isset($_POST["FechaInicio"]) ? $_POST["FechaInicio"] : "" ?>">
            <div class="invalid-feedback">
                <ul>
                  <li>La fecha es obligatorio</li>
                </ul>
            </div>
    </div>

    <div>
        <label for="txtFechaFinalizacion" class="form-label">Fecha de Finalizacion</label>
        <input type="date" id="txtFechaFinalizacion"  class="form-control <?= $valFechaFinalizacion ?>
        " required value="<?php echo isset($_POST["FechaFinalizacion"]) ? $_POST["FechaFinalizacion"] : "" ?>">
            <div class="invalid-feedback">
                <ul>
                    <li>La fecha es obligatorio</li>
                </ul>
            </div>
    </div>



    <div class="d-flex justify-content-between p-4">
        <button class="btn btn-primary" type="submit">Registrar</button>
        <a href="Concurso.php" class="btn btn-danger">Volver</a>
    </div>


    </form>

</body>
</html>
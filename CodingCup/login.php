<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="Vista/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="Vista/CSS/Estilologin.css">
    <script src="Vista/JS/bootstrap.bundle.min.js"></script>


</head>

<body>
    <?php
   // require 'bdXam/RegistroLogin.php'
    ?>
    <div class="container">
        <form method="post" class="row mx-auto g-3" style="width: 40%;" >
            <h3>Iniciar Sesion:</h3>
            <?php
                if($comprobarDatos == "incorrectos"){
                    echo "<label>ERROR: No se encontro los datos del usuario</label>";
                }
            ?>
            <!--NOMBRE-->
            <!--
            <div class=">
                <label for=" txtNombre" class="form-label">Nombre:</label>
                <input type="text" id="txtNombre" name="Nombre" class="form-control <?= $valNombre ?>
                        " placeholder="Nombre" required value="<?php echo isset($_POST["Nombre"]) ? $_POST["Nombre"] : "" ?>">
                <div class="invalid-feedback">
                    <ul>
                        <li>El nombre es obligatorio</li>
                        <li>Debe contener solo caracteres alfabéticos</li>
                    </ul>
                </div>

            </div>
            -->
            <!--CORREO-->
            <div class="">
                <label for="correo" class="form-label">Correo</label>
                <div class="input-group">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg></span>
                    <input type="email" id="txtEmail" name="Email" class="form-control <?= $valCorreo ?>" placeholder="Correo electrónico" required value="<?php echo isset($_POST["Email"]) ? $_POST["Email"] : "" ?>">
                    <div class="invalid-feedback">
                        <ul>
                            <li>El correo electrónico es obligatorio</li>
                            <li>Debe tener un formato válido</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- CONTRASENA -->
            <div class="">
                <label for="txtContrasena" class="form-label">Contraseña:</label>
                <input type="password" id="txtContrasena" name="Contrasena" class="form-control <?= $valContrasena ?>" 
                placeholder="Contraseña" required value="<?php echo isset($_POST["Contrasena"]) ? htmlspecialchars($_POST["Contrasena"]) : "" ?>">
                <div class="invalid-feedback">
                    <ul>
                        <li>La contraseña es requerida</li>
                    </ul>
                </div>
            </div>
            <div class="d-flex justify-content-between p-4">
                <button class="btn btn-primary" type="submit">Entrar</button>
                <a href="index.php" class="btn btn-danger">Volver</a>
            </div>
        </form>
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
</body>

</html>
<?php 

    session_start();
    if(isset($_SESSION['nombre'])) {
        header('Location: app/view/asistencia.php');
    }
?>  

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="app/assets/css/estilo.css" rel="stylesheet">
    <link rel="icon" href="app/assets/img/ovala.png">
</head>
<body>
    <div class="bloqueAzul">
        <h4>UNIVERSIDAD NACIONAL DE INGENIERÍA</h4>
        <h4>FACULTAD DE INGENIERÍA MECÁNICA</h4>
    </div>

    
    <div class="container my-4">
        <main>
            <section>
                <article>
                    <h4><b>INTRANET EARPFIM</b></h4>
                    <h4>Sistema de Planificación de Recursos Académicos y Empresariales</h4>
                </article>
                <article>
                    <form id="formulario" action="app/controller/DocenteController.php" method="post">
                        <div class="mb-3">
                          <label for="usuario" class="form-label">Usuario</label>
                          <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp" placeholder="Ingrese su usuario" name="usuario" required>
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Contraseña</label>
                          <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-iniciar">INICIAR SESIÓN</button>
                    </form>
                      <hr>
                    <figure>
                      <img src="app/assets/img/uni.png" style="width: 100px;">
                    </figure>
                </article>
            </section>
        </main>
    </div>

</body>
</html>
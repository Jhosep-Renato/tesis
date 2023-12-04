<?php 
        session_start();

        if(!isset($_SESSION['usuario'])) {
            header('Location: ../../index.php');
        }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../assets/css/estilo.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/ovala.png">
</head>
<body>
        <?php require('templates/header.php') ?>

        <div class="container" style="height: 100%;">
            <main>

                <section >
                    <article>
                        <h1>Control de Asistencia</h1>

                        <select class="form-select cursos" style="width: 200px;">
                            <option selected value="seleccionar">Seleccionar</option>
                        </select>
                        
                        
                        <div class="mensaje" style="margin-top: 40px;">
                            <h2 style="color: green;">Hola <?php 
                            echo $_SESSION['usuario'];
                         ?>, por favor seleccione un curso</h2>
                        </div>


                        <div class="asistenciaDiv" style="display: none; margin-top: 40px;">
                            <table class="table table-bordered tbAsistencia">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ESTUDIANTE</th>
                                        <th scope="col">FECHA</th>
                                        <th scope="col">ESTADO</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                            <button type="button" class="btn btn-outline-primary" id="registrar">Registrar</button>
                            <button type="button" class="btn btn-outline-primary" id="actualizar" style="display: none;">Actualizar</button>

                            <div class="alert alert-success" role="alert" style="display: none;" id="alert">
                                
                            </div>
                        </div>

                    </article>
                        
                </section>
            </main>
        </div>

    <script type="module" src="../assets/js/asistencia.js"></script>
</body>
</html>
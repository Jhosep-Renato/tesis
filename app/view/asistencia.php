<?php 
        session_start();

        if(!isset($_SESSION['nombre'])) {
            header('Location: ../../index.php');
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../assets/css/estilo.css" rel="stylesheet">
</head>
<body>
        <?php require('templates/header.php') ?>

        <div class="container">
            <main>

                <section >
                    <article>
                        <h1>Control de Asistencia</h1>

                        <select class="form-select" style="width: 200px;" id="cursos">
                            <option selected value="seleccionar">Seleccionar</option>
                        </select>
                        
                        <select class="form-select" style="width: 200px; margin-top: 40px; display:none">

                        </select>

                        <div class="mensaje" style="margin-top: 40px;">
                            <h2 style="color: green;">Hola <?php 
                            echo $_SESSION['nombre'];
                         ?>, por favor seleccione un curso</h2>
                        </div>


                        <div class="asistenciaDiv" style="display: none; margin-top: 40px;">
                            <table class="table table-bordered tbAsistencia">
                                <thead>
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
                        </div>

                    </article>
                        
                </section>
            </main>
        </div>

    <script src="../js/interaccion.js"></script>
</body>
</html>
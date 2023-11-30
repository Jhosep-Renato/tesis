<?php 

    session_start();

    if(!isset($_SESSION['usuario'])) {
        header('Location: ../../index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Asistencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../assets/css/estilo.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/ovala.png">
</head>
    <body>
        <?php require('templates/header.php') ?>  

                        <h1>Historial de asistencia</h1>
                        <select class="form-select cursos" aria-label="Default select example" style="width: 200px;">
                            <option selected value="seleccionar">Seleccionar</option>
                        </select>

                        <div class="mensaje" style="margin-top: 40px;">
                            <h2 style="color: green;" class="h2">Hola <?php 
                            echo $_SESSION['usuario'];
                         ?>, por favor seleccione un curso</h2>
                        </div>
                        
                        <div class="historialDiv" style="display: none; margin-top: 40px;" >
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ESTUDIANTE</th>
                                        <th scope="col">%</th>
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

        <script type="module" src="../assets/js/historial.js"></script>
    </body>
</html>
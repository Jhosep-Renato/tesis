<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/estilo.css" rel="stylesheet">
</head>
<body>
        <header class="bloqueAzul">
            <nav>
                <ul>
                    <li><a href="asistencia.html">Tomar Asistencia de alumnos</a></li>
                    <li><a href="historial.html">Historial de asistencias</a></li>
                    <li><a href="../../index.html" class="seleccionar">Salir</a></li>
                </ul>
            </nav>
        </header>

        <div class="container">
            <main>

                <section >
                    <article>
                        <h1>Control de Asistencias</h1>

                        <select class="form-select" aria-label="Default select example" style="width: 200px;" id="cursos">
                            <option selected value="seleccionar">Seleccionar</option>
                            <option value="hola">hola</option>
                        </select>
                        

                        <div class="mensaje">
                            <h2 style="color: green;">Hola <?php 
                            session_start();
                            echo $_SESSION['nombre'];
                         ?> por favor seleccione un curso</h2>
                        </div>


                        <div class="asistenciaDiv" style="display: none;">
                            <table class="table table-bordered">
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>ASISTIO</td>
                                    <td> <button class="btnI btn"><img src="../img/check.png" class="bimg"></button> <button class="btnI btn"><img src="../img/x.png" class="bimg"></button></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Asistencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../css/estilo.css" rel="stylesheet">
</head>
<body>
        <?php include '../templates/header.php' ?>  


        
                        <h1>Historial de asistencia</h1>
                        <select class="form-select" aria-label="Default select example" style="width: 200px;">
                            <option selected>Seleccionar</option>
                            <option selected>Quimica</option>
                        </select>
                        
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">ESTUDIANTE</th>
                                <th scope="col">%</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Soto Gutierrez</td>
                                    <td> 100% </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark Gonzalo</td>
                                    <td> 100% </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Luis Jara</td>
                                    <td> 100% </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Jhosep Pantja</td>
                                    <td> 100% </td>
                                </tr>
                            </tbody>
                        </table>
                    </article>
                        
                </section>
            </main>
        </div>

        <script src="../js/interaccion.js"></script>
</body>
</html>
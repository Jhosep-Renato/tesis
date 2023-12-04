<?php 

    session_start();
    
    if(!isset($_SESSION['usuario'])) {
        header('Location: ../../../index.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Asistencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../assets/css/estilo.css" rel="stylesheet">
    <link rel="icon" href="../../assets/img/ovala.png">
</head>
<body>
        <header class="bloqueAzul">
            <nav>
                <ul>
                    <li><a href="../../controller/session.php">Cerrar session</a></li>
                </ul>
            </nav>
        </header>
        <div class="container" style="height: 100%;">
            <main>

                <section >
                    <article>
                        <h1>FUNCIONES DE ADMINISTRADOR</h1>

                    </article>

                    <article>
                        <button type="button" class="btn btn-primary" id="btnFormulario" data-bs-toggle="modal" data-bs-target="#formularioModal">
                            Añadir Docente
                        </button>

                            <!-- Modal -->
                        <div class="modal fade" id="formularioModal" tabindex="-1" aria-labelledby="formulario" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="formulario">Añadir Docente</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre">

                                            <label for="apellidoP">Apellido Paterno:</label>
                                            <input type="text" class="form-control" name="apellidoP" id="apellidoP">

                                            <label for="apellidoM">Apellido Materno:</label>
                                            <input type="text" class="form-control"  name="apellidoM" id="apellidoM">

                                            <label>Sexo:</label>
                                            <select class="form-select" id="sexo">
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            </select>

                                            <label for="teñefono">Telefono:</label>
                                            <input type="text" class="form-control" name="teñefono" id="teñefono">

                                            <label for="dni">DNI:</label>
                                            <input type="text" class="form-control" name="dni" id="dni">

                                            <label for="edad">Edad:</label>
                                            <input type="text" class="form-control" name="edad" id="edad">

                                            <label>Horario:</label>

                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                NO
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                SI
                                            </label>
                                            
                                        </form>    

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <input type="submit" class="btn btn-primary" value="Guardar">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">
                        
                        <h3>Asignar curso</h3>

                        <div class="input-group" style="margin-top: 50px; width: 35%; margin-left: auto; margin-right: auto;">
                            <input type="search" class="form-control rounded" placeholder="Codigo Docente" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>Buscar</button>
                        </div>


                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Horario</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Fecha Inicio</th>
                                    <th scope="col">Fecha Finalización</th>
                                    <th scope="col">Curso</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <button type="button" class="btn btn-primary">Asignar</button>

                    </article>
                        
                </section>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
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
    <title>Administrador</title>
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

                                    <form id="formularioDocente">

                                        <div class="modal-body">
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" class="form-control" name="nombre" id="nombre" oninput="validarLetras(this)" required>

                                                <label for="apellidoP">Apellido Paterno:</label>
                                                <input type="text" class="form-control" name="apellidoP" id="apellidoP" oninput="validarLetras(this)" required> 

                                                <label for="apellidoM">Apellido Materno:</label>
                                                <input type="text" class="form-control"  name="apellidoM" id="apellidoM" oninput="validarLetras(this)" required>

                                                <label for="sexo">Sexo:</label>
                                                <select class="form-select" id="sexo" name="sexo">
                                                    <option value="F">Femenino</option>
                                                    <option value="M">Masculino</option>
                                                </select>

                                                <label for="telefono">Telefono:</label>
                                                <input type="text" class="form-control" name="telefono" id="telefono" oninput="validarNumero(this)" maxlength="9" required>

                                                <label for="dni">DNI:</label>
                                                <input type="text" class="form-control" name="dni" id="dni" oninput="validarNumero(this)" maxlength="8" required>

                                                <label for="edad">Edad:</label>
                                                <input type="text" class="form-control" name="edad" id="edad" oninput="validarNumero(this)" maxlength="2" required>

                                                <label>Horario:</label>

                                                <input class="form-check-input" type="radio" name="opcion" id="si" value="si">
                                                <label class="form-check-label" for="si">
                                                    SI
                                                </label>
                                                <input class="form-check-input" type="radio" name="opcion" id="no" value="no" checked>
                                                <label class="form-check-label" for="no">
                                                    NO
                                                </label>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrar">Cerrar</button>
                                            <input type="button" class="btn btn-primary" value="Guardar" id="guardar">
                                        </div>
                                    </form>    

                                </div>
                            </div>
                        </div>

                        <hr class="my-4">
                        
                        <h3 class="my-4">Asignar curso</h3>

                        <div class="container contForm">

                            <form id="formularioCurso">
                                <div class="hijo">
                                    <label for="docente">Codigo Docente: </label>
                                    <input type="text" name="docente" class="form-control" id="docente" required>

                                    <label for="curso">Nombre Curso: </label>
                                    <input type="text" name="curso" class="form-control" id="curso" required>
                                    
                                    <label for="fechaInicio">Fecha de Inicio: </label>
                                    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>

                                    <label for="fechaFin">Fecha Final: </label>
                                    <input type="date" class="form-control" id="fechaFin" name="fechaFin" required>

                                    <label for="grupo">Grupo Nmr: </label>
                                    <input type="text" name="grupo" class="form-control" id="grupo" required>

                                    <button type="submit" class="btn btn-primary my-4" id="asignar">Asignar</button>
                                </div>
                            </form>

                        </div>

                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Grupo</th>
                                        <th scope="col">Curso</th>
                                        <th scope="col">Horario</th>
                                        <th scope="col">Codigo docente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        

                    </article>
                        
                </section>
            </main>
        </div>

        <script>
            function validarNumero(input) {

                input.value = input.value.replace(/[^0-9]/g, '');
            }

            function validarLetras(input) {
      // Elimina caracteres que no sean letras
                input.value = input.value.replace(/[^A-Za-z]/g, '');
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="../../assets/js/administrador.js"></script>
    </body>
</html>
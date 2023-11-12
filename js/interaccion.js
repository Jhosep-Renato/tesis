document.getElementById('formulario').addEventListener('submit', (event) => {

    event.preventDefault();
    const usuario = document.getElementById('usuario');

    if(usuario.value === 'renato') {
        window.location.href = '/view/docente/asistencia.html';

    }
    else if(usuario.value === 'admin') {
        window.location.href = '/view/administrador/editar.html';
    }
    console.log(usuario.value)
})
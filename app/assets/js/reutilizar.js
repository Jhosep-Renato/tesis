export function alumnosTabla(alumnos, body, verificar) {
    
    alumnos.forEach(a => {

        const tr = document.createElement('tr');
        const td1 = document.createElement('td');
        const td2 = document.createElement('td');
        const td3 = document.createElement('td');
        const td4 = document.createElement('td');
        const td5 = document.createElement('td');

        const botones = inicializarBotones();

        const date = Date.now();

        td1.textContent = a['codigo'];
        td2.textContent = `${a['nombre']} ${a['apePaterno']} ${a['apeMaterno']}`;
        
        if(verificar) {
            td3.textContent = `${a['fechaRegistro']}`;
        } else {
            td3.textContent = `${new Date(date).toLocaleDateString()}`
        }
        
        if(a.hasOwnProperty('estado')) {
            
            td4.textContent = a['estado'];

            if(a['estado'] == 'P') {
                td4.style.backgroundColor = '#B9EAB3';
            }
            else if(a['estado'] == 'F'){
                td4.style.backgroundColor = '#D9B4BB';
            } else {
                td4.style.backgroundColor = '#e2d27b';
            }
        }

        td5.appendChild(botones[0]);
        td5.appendChild(botones[2]);
        td5.appendChild(botones[1]);

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);

        body.appendChild(tr);
    });

    agregarFunciones();
}

export function inicializarBotones() {

    const button1 = document.createElement('button');
    const button2 = document.createElement('button');
    const button3 = document.createElement('button');
    const img1 = document.createElement('img');
    const img2 = document.createElement('img');
    const img3 = document.createElement('img');

    button1.classList.add("btnI", "btn", "check");
    button2.classList.add("btnI", "btn", "x");
    button3.classList.add("btnI", "btn", "reloj");

    img1.classList.add("bimg");
    img2.classList.add("bimg");
    img3.classList.add("bimg");

    img1.src = "../assets/img/check.png";
    img2.src = "../assets/img/x.png";
    img3.src = "../assets/img/reloj.jpg";

    button1.appendChild(img1);
    button2.appendChild(img2);
    button3.appendChild(img3);

    return [button1, button2, button3];
}

export function eliminarFilas(tbody) {
    while(tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }
}

export function agregarFunciones() {

    const botones = document.querySelectorAll('.btnI');

    botones.forEach((b) => {
        b.addEventListener('click', () => {
            if(b.classList.contains('check')) {
                let indice = posicionBotones(b);
                indice.textContent = 'P';
                indice.style.backgroundColor = '#B9EAB3';

            } else if(b.classList.contains('x')) {
                let indice = posicionBotones(b);
                indice.textContent = 'F';
                indice.style.backgroundColor = '#D9B4BB';
            } else {
                let indice = posicionBotones(b);
                indice.textContent = 'T';
                indice.style.backgroundColor = '#e2d27b';
            }
        })
    });
}

export function posicionBotones(boton) {
    const columna = boton.parentElement;
    const fila = columna.parentElement;
    const indiceColumna = Array.from(fila.children).indexOf(columna);

    return columna.parentElement.cells[indiceColumna - 1];
}
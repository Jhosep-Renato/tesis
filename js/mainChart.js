const ctx = document.getElementById('myChart');
const names = ['Carlos', 'Pedro', 'Maria'];
const ages = [23, 12, 11, 51];

new Chart(ctx, {
    type: "pie",
    data: {
        labels: names,
        datasets:   [{
            label: 'Edad',
            data: ages,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderWidth: 1.5
            
        }]
    },
    options: {
        responsive: false, // Evita que el gráfico se redimensione automáticamente
        maintainAspectRatio: false, // Permite modificar el aspect ratio
        width: 700, // Ancho personalizado
        height: 700 // Alto personalizado
    }
});
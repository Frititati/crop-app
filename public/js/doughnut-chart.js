const dataDoughnut = {
    labels: [
        'Alberi per il Piemonte',
        'Sguardo nel Verde',
        'Treedom'
    ],
    datasets: [{
        label: 'My First Dataset',
        data: [33, 33, 33],
        backgroundColor: [
            'rgb(70, 161, 126)',
            'rgb(123, 173, 119)',
            'rgb(165, 187, 111)'
        ],
        hoverOffset: 4
    }]
}

const context = document.getElementById('doughnut-chart').getContext('2d');

const configDoughnut = {
    type: 'doughnut',
    data: dataDoughnut,
    options: {
        plugins: {
            legend: {
                display: false,
            },
            tooltip: {
                bodyColor: '#fff',
                bodyFont: {
                    weight: 'bold',
                },
                bodyAlign: 'center',
            },
        },
    }
};

const chartDoughnut = new Chart(context, configDoughnut)

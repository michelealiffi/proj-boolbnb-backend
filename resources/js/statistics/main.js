const visitsData = window.visitsData;
const messagesData = window.messagesData;

        const visitsChartCtx = document.getElementById('visitsChart').getContext('2d');
        const messagesChartCtx = document.getElementById('messagesChart').getContext('2d');

        const visitsChart = new Chart(visitsChartCtx, {
            type: 'bar',
            data: {
                labels: visitsData.map(v => v.year + '/' + String(v.month).padStart(2, '0')),
                datasets: [{
                    label: 'Visualizzazioni',
                    data: visitsData.map(v => v.total),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const messagesChart = new Chart(messagesChartCtx, {
            type: 'bar',
            data: {
                labels: messagesData.map(m => m.year + '/' + String(m.month).padStart(2, '0')),
                datasets: [{
                    label: 'Messaggi',
                    data: messagesData.map(m => m.total),
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Event Listener per il filtro
        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const year = document.getElementById('year').value;
            const month = document.getElementById('month').value;
            // Esegui la logica di filtro, come inviare una richiesta AJAX
        });

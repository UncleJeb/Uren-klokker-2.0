<canvas id="uurLineChart" width="400" height="400"></canvas>

<script>

    var line_data = [{
        data: [amount , sumAmount],
        backgroundColor: [
            'rgba(17, 16, 29, 1)',
            'rgba(17, 16, 29, 1)',
        ],
        borderColor: [
            'rgba(0, 204, 255, 1)',
            'rgba(212, 0, 212, 1)',
        ],
    }];

    var line_options = {
        event: [],
        resposive: true,
        plugins: {
            labels: {
                title: {
                    font: {
                        size: '17',
                        family: 'SpaceMono',
                    }
                }
            }
        }
    }

    var line_ctx = document.getElementById('uurLineChart').getContext('2d');
    var config = new Chart(line_ctx, {
        type: 'line',
        data: {
            datasets: line_data
        },
        options: line_options
    })
</script>
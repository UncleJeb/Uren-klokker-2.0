<canvas id="uurPieChart" width="400" height="400"></canvas>
<script>
    const ctx = document.getElementById('uurPieChart').getContext('2d');
    const uurPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
            'Hours Made',
            'Hours left',
            ],
            datasets: [{
                labels: 'Total Hours',
                data: [<?php echo $rowsum["sumuren"] ?? null; ?>, 640 - <?php echo $rowsum["sumuren"]; ?>],
                backgroundColor: [
                    'rgba(17, 16, 29, 1)',
                    'rgba(17, 16, 29, 1)',
                ],
                borderColor: [
                    'rgba(0, 204, 255, 1)',
                    'rgba(212, 0, 212, 1)',
                ],
                borderWidth: 1,
            }],
        },
        plugins: {
      legend: {
        position: 'top',
      },
    },
    });
</script>
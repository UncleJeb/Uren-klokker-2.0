<canvas id="uurPieChart" width="400" height="400"></canvas>

<script>
    Chart.register(ChartDataLabels);
var amount = <?php echo $rowsum["sumuren"] ?? null; ?>;
var sumAmount = 440 - <?php echo $rowsum["sumuren"]; ?>;

var data = [{
    data: [amount , sumAmount],
    backgroundColor: [
                    'rgba(17, 16, 29, 1)',
                    'rgba(17, 16, 29, 1)',
                ],
    borderColor: [
        'rgba(0, 204, 255, 1)',
        'rgba(212, 0, 212, 1)',
    ],
    borderWidth: 1,
}];

var options = {
    events: [],
    responsive: true,
    plugins: {
        datalabels: {
            formatter: (value, ctx) => {
                let sum = 0;
                let dataArr = ctx.chart.data.datasets[0].data;
                dataArr.map(data => {
                    sum += data;
                });
                let percentage = (value*100 / sum).toFixed(2)+"%";
                return percentage;
            },
            color: '#fff',

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
};

var ctx = document.getElementById('uurPieChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        datasets: data
    },
    options: options
});
</script>
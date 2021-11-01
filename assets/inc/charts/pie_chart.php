<canvas id="uurPieChart" width="400" height="400"></canvas>

<script>
    Chart.register(ChartDataLabels);
var amount = <?php echo $rowsum["sumuren"] ?? null; ?>;
var sumAmount = 440 - <?php echo $rowsum["sumuren"]; ?>;

var data = [{
    data: [amount , sumAmount],
    backgroundColor: [
                    'rgba(44, 44, 44, 1)',
                    'rgba(44, 44, 44, 1)',
                ],
    borderColor: [
        'rgba(228, 87, 5, 1)',
        'rgba(170, 37, 0, 1)',
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
<x-layouts.app>
    <div class="uk-child-width-1-2 uk-grid-match" data-uk-grid>
        <!-- Chart's container -->
        <div class="chart-container">
            <canvas id="chart1"></canvas>
        </div>

        <div class="chart-container">
            <canvas id="chart"></canvas>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script>
var char1El = document.getElementById('chart1');
new Chart(char1El, {
  type: 'bar',
  data: {
    labels: ["Total Projects", "Total Tasks", "Total Users", "Total Customers"],
    datasets: [{
      label: "Total",
      backgroundColor: ["#1d8cf8", "#e14eca", "#00f2c3", "#ff8d72"],
      data: [1478, 5267, 3600, 1900]
    }]
  },

  options: {
    responsiveAnimationDuration: 500,
    legend: {
      display: false
    },
    animation: {
      duration: 2000
    },
    title: {
      display: true,
      text: 'Predicted world population (millions) in 2050'
    }
  }
});
    </script>
</x-layouts.app>

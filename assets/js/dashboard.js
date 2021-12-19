(function($) {
  'use strict';
  $(function() {
    if ($("#chart-sales").length) {
      var areaData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        datasets: [{
            data: [0, 245, 75, 150, 100, 150, 50, 100],
            backgroundColor: [
              'rgba(235, 105, 143, .7)'
            ],
            borderColor: [
              '#eb698f'
            ],
            borderWidth: 1,
            fill: 'origin',
            label: "online"
          },
          {
            data: [0, 100, 200, 100, 150, 75, 200, 50],
            backgroundColor: [
              'rgba(119, 111, 249, .9)'
            ],
            borderColor: [
              '#776ff9'
            ],
            borderWidth: 1,
            fill: 'origin',
            label: "store"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: false,
            ticks: {
              display: false
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: false,
            ticks: {
              display: false,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 15,
              min: 0,
              max: 250
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: .25
          },
          point: {
            radius: 0
          }
        }
      }
      var salesChartCanvas = $("#chart-sales").get(0).getContext("2d");
      var salesChart = new Chart(salesChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
      document.getElementById('sales-legend').innerHTML = salesChart.generateLegend();
    }
    if ($("#dashboard-monthly-analytics").length) {
      var ctx = document.getElementById('dashboard-monthly-analytics').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Arl', 'May', 'Jun', 'Jul', 'Aug'],
          datasets: [{
              label: "Ios",
              borderColor: 'rgba(77, 124, 255, .8)',
              backgroundColor: 'rgba(77, 124, 255, .8)',
              pointRadius: 0,
              fill: true,
              borderWidth: 1,
              fill: 'origin',
              data: [0, 0, 30, 0, 0, 0, 50, 0]
            },
            {
              label: "Android",
              borderColor: 'rgba(235, 105, 143, .9)',
              backgroundColor: 'rgba(235, 105, 143, .9)',
              pointRadius: 0,
              fill: true,
              borderWidth: 1,
              fill: 'origin',
              data: [0, 35, 0, 0, 30, 0, 0, 0]
            },
            {
              label: "Windows",
              borderColor: 'rgba(241, 155, 84, .8)',
              backgroundColor: 'rgba(241, 155, 84, .8)',
              pointRadius: 0,
              fill: true,
              borderWidth: 1,
              fill: 'origin',
              data: [0, 0, 0, 40, 10, 50, 0, 0]
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false,
            position: "top"
          },
          scales: {
            xAxes: [{
              ticks: {
                display: true,
                beginAtZero: true,
                fontColor: '#696969'
              },
              gridLines: {
                display: false,
                drawBorder: false,
                color: 'transparent',
                zeroLineColor: '#eeeeee'
              }
            }],
            yAxes: [{
              gridLines: {
                drawBorder: false,
                display: true,
                color: '#b8b8b8',
              },
              categoryPercentage: 0.5,
              ticks: {
                display: true,
                beginAtZero: true,
                stepSize: 20,
                max: 80,
                fontColor: '#696969'
              }
            }]
          },
        },
        elements: {
          point: {
            radius: 0
          }
        }
      });
      document.getElementById('js-legend').innerHTML = myChart.generateLegend();
    }
  });
})(jQuery);
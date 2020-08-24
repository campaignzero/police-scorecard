<script>
  var SCORECARD_STATE = '{{ $state }}';
  var SCORECARD_DATA = {!! json_encode($scorecard) !!};
  var map_data = {
    city: {!! $type === 'police-department' ? getMapData($state, 'police-department', $grades) : 'null' !!} ,
    sheriff: {!! $type === 'sheriff' ? getMapData($state, 'sheriff', $grades) : 'null' !!},
    selected: {!! getMapLocation($type, $scorecard, $location) !!}
  };
</script>

<script src="/maps/us-{{ strtolower($state) }}-all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

@if (isset($scorecard['arrests']['arrests_2016']) && isset($scorecard['arrests']['arrests_2017']) && isset($scorecard['arrests']['arrests_2018']))
<script>
  window.addEventListener('load', function() {
    var ctx = document.getElementById('bar-chart-arrests').getContext('2d');
    var arrestsData = {!! generateArrestChart($scorecard, $type) !!};
    window.myBarArrests = new Chart(ctx, {
      type: 'bar',
      data: arrestsData,
      options: {
        maintainAspectRatio: false,
        responsive: document.documentElement.clientWidth > 940 ? false : true,
        legend: {
          display: false,
        },
        title: {
          display: false,
        },
        tooltips: {
          mode: 'index',
          intersect: false,
          callbacks: {
            label: function(tooltipItem, data) {
              var label = (data.datasets[tooltipItem.datasetIndex].label) ? ' ' + data.datasets[tooltipItem.datasetIndex].label : '';

              if (label) {
                label += ': ';
              }

              label += PoliceScorecard.numberWithCommas(tooltipItem.yLabel);

              return label;
            }
          },
        },
        scales: {
          xAxes: [{
            stacked: true,
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            }
          }],
          yAxes: [{
            stacked: true,
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            },
            ticks: {
              beginAtZero: true,
              maxTicksLimit: 2,
              callback: function(value, index, values) {
                return (value === 0) ? '' : PoliceScorecard.numberWithCommas(value);
              }
            }
          }]
        }
      }
    });
  });

</script>
@endif

@if(isset($scorecard['police_violence']['police_shootings_2016']) && isset($scorecard['police_violence']['police_shootings_2017']) && isset($scorecard['police_violence']['police_shootings_2018']))
<script>
  window.addEventListener('load', function() {
    var ctx = document.getElementById('bar-chart-history').getContext('2d');
    var historyChartData = {!! generateHistoryChart($scorecard) !!};
    window.myBarHistory = new Chart(ctx, {
      type: 'bar',
      data: historyChartData,
      options: {
        animation: {
          duration: 0,
        },
        maintainAspectRatio: false,
        responsive: document.documentElement.clientWidth > 940 ? false : true,
        legend: {
          display: false,
        },
        title: {
          display: false,
        },
        tooltips: {
          mode: 'index',
          intersect: false
        },
        scales: {
          xAxes: [{
            stacked: true,
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            }
          }],
          yAxes: [{
            stacked: true,
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            },
            ticks: {
              beginAtZero: true,
              maxTicksLimit: 2,
              callback: function(value, index, values) {
                return (value === 0) ? '' : Math.round(value);
              }
            }
          }]
        }
      }
    });
  });

</script>
@endif

@if(isset($scorecard['police_funding']['fines_forfeitures_2010']) && isset($scorecard['police_funding']['fines_forfeitures_2011']) && isset($scorecard['police_funding']['fines_forfeitures_2012']))
<script>
  window.addEventListener('load', function() {
    var ctxFundsTaken = document.getElementById('bar-chart-funds-taken').getContext('2d');
    var chartFundsTakenData = {!! generateBarChartFundsTaken($scorecard) !!};
    window.chartFundsTaken = new Chart(ctxFundsTaken, {
      type: 'bar',
      data: chartFundsTakenData,
      options: {
        animation: {
          duration: 0,
        },
        maintainAspectRatio: false,
        responsive: document.documentElement.clientWidth > 940 ? false : true,
        legend: {
          display: false,
        },
        title: {
          display: false,
        },
        tooltips: {
          mode: 'index',
          intersect: false,
          callbacks: {
            label: function(tooltipItem, data) {
              var label = (data.datasets[tooltipItem.datasetIndex].label) ? ' ' + data.datasets[tooltipItem.datasetIndex].label : '';

              if (label) {
                label += ': ';
              }

              label += PoliceScorecard.nFormatter(tooltipItem.yLabel);

              return label;
            }
          },
        },
        scales: {
          xAxes: [{
            stacked: true,
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            }
          }],
          yAxes: [{
            stacked: true,
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            },
            ticks: {
              beginAtZero: true,
              maxTicksLimit: 2,
              callback: function(value, index, values) {
                return (value === 0) ? '' : PoliceScorecard.nFormatter(value);
              }
            }
          }]
        }
      }
    });
  });

</script>
@endif

@if(isset($scorecard['police_funding']['total_officers_2013']) && isset($scorecard['police_funding']['total_officers_2014']) && isset($scorecard['police_funding']['total_officers_2015']))
<script>
  window.addEventListener('load', function() {
    var ctxOfficers = document.getElementById('bar-chart-officers-per-population').getContext('2d');
    var chartOfficersData = {!! generateBarChartOfficers($scorecard) !!};
    window.chartFundsTaken = new Chart(ctxOfficers, {
      type: 'bar',
      data: chartOfficersData,
      options: {
        animation: {
          duration: 0,
        },
        maintainAspectRatio: false,
        responsive: document.documentElement.clientWidth > 940 ? false : true,
        legend: {
          display: false,
        },
        title: {
          display: false,
        },
        tooltips: {
          mode: 'index',
          intersect: false,
          callbacks: {
            label: function(tooltipItem, data) {
              var label = (data.datasets[tooltipItem.datasetIndex].label) ? ' ' + data.datasets[tooltipItem.datasetIndex].label : '';

              if (label) {
                label += ': ';
              }

              label += PoliceScorecard.numberWithCommas(tooltipItem.yLabel);

              return label;
            }
          },
        },
        scales: {
          xAxes: [{
            stacked: true,
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            }
          }],
          yAxes: [{
            stacked: true,
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            },
            ticks: {
              beginAtZero: true,
              maxTicksLimit: 2,
              callback: function(value, index, values) {
                return (value === 0) ? '' : PoliceScorecard.numberWithCommas(value);
              }
            }
          }]
        }
      }
    });
  });

</script>
@endif

@if(isset($scorecard['report']['percentile_police_spending']) || isset($scorecard['report']['hispanic_murder_unsolved_rate']) || isset($scorecard['report']['white_murder_unsolved_rate']))
<script>
  window.addEventListener('load', function() {
    var barChartData = {!! generateBarChart($scorecard, $type) !!};

    var $chart = document.getElementById('bar-chart');

    if (!$chart) {
      return false;
    }

    var ctx = $chart.getContext('2d');
    window.myBar = new Chart(ctx, {
      type: 'bar',
      data: barChartData,
      options: {
        maintainAspectRatio: false,
        tooltips: {
          callbacks: {
            label: function(tooltipItem, data) {
              var label = (data.datasets[tooltipItem.datasetIndex].label) ? ' ' + data.datasets[tooltipItem.datasetIndex].label : '';

              if (label) {
                label += ': ';
              }

              label += PoliceScorecard.nFormatter(tooltipItem.yLabel);

              return label;
            }
          },
        },
        responsive: document.documentElement.clientWidth > 940 ? false : true,
        legend: {
          display: false,
        },
        title: {
          display: false,
        },
        scales: {
          xAxes: [{
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            }
          }],
          yAxes: [{
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            },
            ticks: {
              beginAtZero: true,
              maxTicksLimit: 2,
              callback: function(value, index, values) {
                return (value === 0) ? '' : PoliceScorecard.nFormatter(value);
              }
            }
          }]
        }
      }
    });
  });

</script>
@endif

<script>
  var policeFundingChart = {!! getPoliceFundingChart($scorecard['police_funding']) !!};
  window.addEventListener('load', function() {
    if (policeFundingChart && typeof policeFundingChart.labels !== 'undefined' && policeFundingChart.labels.length > 0) {
      Highcharts.chart(document.getElementById('chart-police-funding'), {
        chart: {
          type: 'area',
          height: 300
        },
        legend: {
          align: 'center',
          verticalAlign: 'top',
          layout: 'horizontal',
          width: '100%',
          margin: 30,
          padding: 0
        },
        title: {
          enabled: false,
          text: ''
        },
        yAxis: {
          labels: {
            enabled: true,
            formatter: function () {
              return (this.value === 0) ? '' : PoliceScorecard.nFormatter(this.value);
            }
          },
          title: {
            text: ''
          }
        },
        colors: [
          '#dc4646',
          '#7c8894',
          '#c5882a'
        ],
        tooltip: {
          className: 'police-funding',
          followPointer: false,
          shared: true,
          borderWidth: 0,
          backgroundColor: 'rgba(0, 0, 0, 0.9)',
          borderRadius: 8,
          padding: 16,
          shadow: false,
          style: {
            color: '#FFF',
            padding: 8
          },
          pointFormatter: function() {
            return '<span style="color:' + this.color + '; font-size: 16px; vertical-align: middle;">●</span> ' + this.series.name + ': <b>$' + this.y.toLocaleString() + '</b><br/>';
          }
        },
        xAxis: {
          categories: policeFundingChart.labels,
          title: {
            enabled: false
          }
        },
        plotOptions: {
          series: {
            fillOpacity: 0.1
          }
        },
        series: [
          {
            name: 'Police',
            lineColor: '#dc4646',
            marker: {
              symbol: 'circle'
            },
            data: policeFundingChart.police
          },
          {
            name: 'Health',
            lineColor: '#7c8894',
            marker: {
              symbol: 'circle'
            },
            data: policeFundingChart.health
          },
          {
            name: 'Housing',
            lineColor: '#c5882a',
            marker: {
              symbol: 'circle'
            },
            data: policeFundingChart.housing
          }
        ]
      });
    }
  });
</script>

<script>
  window.addEventListener('load', function() {
    var $deadlyForceChart = document.getElementById('deadly-force-chart');
    var $chartMiniPeopleKilled = document.getElementById('chart-mini-people-killed');
    var $chartMiniComplaintsReported = document.getElementById('chart-mini-complaints-reported');

    PoliceScorecard.loadMap('{{ $state }}');

    if ($deadlyForceChart) {
      var chart = new Chart($deadlyForceChart.getContext('2d'), {
        type: 'doughnut',
        options: {
          cutoutPercentage: 75,
          animation: {
            animateRotate: true,
            animateScale: false
          },
          tooltips: {
            callbacks: {
              label: function(tooltip, data) {
                return ' ' + data['labels'][tooltip.index] + ': ' + data['datasets'][tooltip.datasetIndex]['data'][tooltip.index] + '%';
              }
            }
          },
          legend: {
            display: true,
            labels: {
              boxWidth: 20
            }
          }
        },
        data: {
          labels: [
            'Unarmed',
            'Other',
            'Gun',
            'Vehicle'
          ],
          datasets: [{
            borderWidth: 0,
            data: [
              {{ $scorecard['report']['percent_used_against_people_who_were_unarmed'] }},
              {{ ($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun'] - $scorecard['report']['percent_used_against_people_who_were_unarmed']) }},
              {{ (100 - floatval($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun'])) }},
              {{ $scorecard['police_violence']['vehicle_people_killed'] }}
            ],
            backgroundColor: [
              '#dc4646',
              '#5a6f83',
              '#f3f4f6',
              '#aab8c5'
            ],
            hoverBackgroundColor: [
              '#dc4646',
              '#5a6f83',
              '#f3f4f6',
              '#aab8c5'
            ]
          }]
        }
      });
    }

    if ($chartMiniPeopleKilled) {
      Highcharts.chart($chartMiniPeopleKilled, {
        chart: {
          type: 'column',
          backgroundColor: 'transparent',
          width: 100,
          height: 100,
          margin: 0,
          maintainAspectRatio: false,
          clip: false
        },
        responsive: document.documentElement.clientWidth > 940 ? false : true,
        legend: {
          enabled: false
        },
        title: {
          enabled: false,
          text: ''
        },
        tooltip: {
          enabled: false
        },
        xAxis: {
          gridLineWidth: 0,
          lineWidth: 0,
          tickWidth: 0,
          labels: {
            enabled: false
          },
          title: {
            text: ''
          }
        },
        yAxis: {
          gridLineWidth: 0,
          lineWidth: 0,
          tickWidth: 0,
          labels: {
            enabled: false
          },
          title: {
            text: ''
          }
        },
        plotOptions: {
          series: {
            borderWidth: 0,
            groupPadding: 0,
            pointPadding: 0.1,
            animation: false,
            enableMouseTracking: false,
            color: '#FFFFFF',
            dataLabels: {
              rotation: -90,
              color: '#d8d8d8',
              enabled: true,
              format: '{point.name}',
              align: 'left',
              y: -8,
              shadow: false,
              crop: false,
              style: {
                fontSize: document.documentElement.clientWidth > 940 ? '12px' : '10px',
                fontFamily: 'Verdana, sans-serif',
                textTransform: 'uppercase',
                opacity: '1 !important'
              }
            }
          }
        },
        series: [{
          data: [
            ['Black', {{ (!isset($scorecard['agency']['black_population']) || $scorecard['agency']['black_population'] === 0) ? 0.1 : round(0.1 + ($scorecard['police_violence']['black_people_killed'] / $scorecard['agency']['black_population']) * 100, 2) }}],
            ['Latinx', {{ (!isset($scorecard['agency']['hispanic_population']) || $scorecard['agency']['hispanic_population'] === 0) ? 0.1 : round(0.1 + ($scorecard['police_violence']['hispanic_people_killed'] / $scorecard['agency']['hispanic_population']) * 100, 2) }}],
            ['White', {{ (!isset($scorecard['agency']['white_population']) || $scorecard['agency']['white_population'] === 0) ? 0.1 : round(0.1 + ($scorecard['police_violence']['white_people_killed'] / $scorecard['agency']['white_population']) * 100, 2) }}]
          ]
        }]
      });
    }

    if ($chartMiniComplaintsReported) {
      new Chart($chartMiniComplaintsReported.getContext('2d'), {
        type: 'doughnut',
        chart: {
          backgroundColor: 'transparent',
          width: 125,
          height: 125
        },
        responsive: document.documentElement.clientWidth > 940 ? false : true,
        legend: {
          enabled: false
        },
        title: {
          enabled: false,
          text: ''
        },
        tooltip: {
          enabled: false
        },
        options: {
          cutoutPercentage: 75,
          animation: {
            animateRotate: true,
            animateScale: false
          },
          tooltips: {
            display: false
          },
          legend: {
            display: false
          }
        },
        data: {
          datasets: [{
            borderWidth: 0,
            data: [
              CHART_MINI_SUSTAINED,
              (CHART_MINI_REPORTED === 0) ? 1 : CHART_MINI_REPORTED
            ],
            backgroundColor: [
              '#d8d8d8',
              '#58595b'
            ]
          }]
        }
      });

      var label = ((CHART_MINI_SUSTAINED === 0 && CHART_MINI_REPORTED === 0) || CHART_MINI_REPORTED === 0) ? '0' : Math.round((CHART_MINI_SUSTAINED / CHART_MINI_REPORTED) * 100);
      document.getElementById('chart-mini-complaints-reported-label').innerHTML = label + '%';
    }

    setTimeout(function() {
        Array.prototype.forEach.call(document.getElementsByClassName('highcharts-credits'), function(el) {
            el.innerHTML = '';
        });
    }, 10)

    setTimeout(PoliceScorecard.animate, 250);
  });
</script>

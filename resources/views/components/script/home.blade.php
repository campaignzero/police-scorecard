<script src="{{ $type === 'police-department' ? asset('/maps/us-all.js') : asset('/maps/us-all-all.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

<script>
var map_type = '{{ $type }}';
var map_data = {!! getNationalMapData($states, $type) !!};

document.getElementById('map-loading').style.display = 'block';

window.addEventListener('load', function() {
  window.SCORECARD_MAP = Highcharts.mapChart('usa-map', {
    chart: {
      animation: false,
      backgroundColor: 'transparent',
      borderWidth: 0,
      margin: 0,
      zoomType: false,
      styleMode: false,
      turboThreshold: 0,
      events: {
        load: function () {
          document.getElementById('map-loading').style.display = 'none';
        }
      }
    },
    title: {
      text: '',
      style: {
        display: 'none'
      }
    },
    legend: {
      enabled: false
    },
    mapNavigation: {
      enabled: false
    },
    tooltip: {
      followPointer: false,
      shared: false,
      formatter: function () {
        var city = this.point.name;
        var percent = Math.round(parseFloat(this.point.value));
        var incompleteIndicator = (this.point.colorIndex === 1) ? '<span style="color: rgba(255, 255, 255, 0.5); font-size: 24px; margin: 0; padding: 0; font-weight: 300;"> *</span><br>' : '<br>';
        var incompleteMessage = (this.point.colorIndex === 1) ? '<p style="color: rgba(0, 0, 0, 0); font-size: 5px; margin: 0; padding: 0;">.</p><br><p style="color: rgba(255, 255, 255, 0.5); font-size: 10px; display: block; margin: 0; padding: 0; text-transform: uppercase;">* Incomplete Data</p>' : '';

        var title = '<span style="color: rgba(255, 255, 255, 0.75); font-family: \'Barlow Condensed\', sans-serif; text-transform: uppercase; display: block; margin: 0; padding: 0; ">' + this.series.name + '</span><br>';
        var department = '<strong style="color: #FFF; font-weight: 600; font-size: 24px; line-height: 24px; font-family: \'Barlow Condensed\', sans-serif; text-transform: uppercase; margin: 0; padding: 0; ">' + city + '</strong>';
        var score = '<span style="color: #FFF; font-family: \'Barlow Condensed\', sans-serif; text-transform: uppercase; font-size: 28px; line-height: 28px; font-weight: 300; margin-top: 4px;  display: block; margin: 0; padding: 0; ">' + percent + '%</span><br>';

        var newTooltip = title + department + incompleteIndicator + score + incompleteMessage;

        return newTooltip;
      }
    },
    plotOptions: {
      map: {
        animation: false,
        allAreas: false,
        mapData: map_type === 'police-department' ? Highcharts.maps['countries/us/us-all'] : Highcharts.maps['countries/us/us-all-all'],
      },
      series: {
        stickyTracking: false,
        animation: false,
        clip: false,
        states: {
          hover: {
            halo: {
              size: 9,
              attributes: {
                fill: 'transparent',
                'stroke-width': 2,
                stroke: '#000000'
              }
            }
          },
          inactive: {
            opacity: 1
          }
        }
      }
    },
    series: [
      {
        allAreas: true,
        showInLegend: false,
        joinBy: null,
        turboThreshold: 0
      }
    ]
  });

  Highcharts.mapChart('usa-map-shadow', {
    chart: {
      animation: false,
      backgroundColor: 'transparent',
      borderWidth: 0,
      margin: 0,
      zoomType: false,
      styleMode: true
    },
    title: {
      text: '',
      style: {
        display: 'none'
      }
    },
    legend: {
      enabled: false
    },
    mapNavigation: {
      enabled: false
    },
    plotOptions: {
      map: {
        animation: false,
        allAreas: false,
        mapData: map_type === 'police-department' ? Highcharts.maps['countries/us/us-all'] : Highcharts.maps['countries/us/us-all-all'],
      },
      series: {
        animation: false
      }
    },
    series: [
      {
        animation: false,
        allAreas: true,
        showInLegend: true
      }
    ]
  });

  if (map_type === 'police-department' && map_data) {
    var MARKER_RADIUS = 8;

    // A GRADE
    window.SCORECARD_MAP.addSeries({
      id: 'grade-a',
      animation: false,
      type: 'mappoint',
      name: 'Police Department',
      data: map_data[6],
      joinBy: null,
      shadow: false,
      turboThreshold: 0,
      showInLegend: false,
      marker: {
        width: MARKER_RADIUS,
        height: MARKER_RADIUS,
        symbol: 'url({{ asset("/images/police-marker-a.svg") }})'
      },
      dataLabels: {
        formatter: function () {
          return '';
        }
      },
      events: {
        click: function (e) {
          if (e.point && typeof e.point.className !== 'undefined') {
            var loc = e.point.className.replace('location-', '');

            if (loc && window.leftMouseClicked) {
              window.location = '/' +  e.point.stateAbbr + '/' + map_type + '/' + loc;
              e.preventDefault();
              e.stopImmediatePropagation();
            }
          }
        }
      }
    });

    // B GRADE
    window.SCORECARD_MAP.addSeries({
      id: 'grade-b',
      animation: false,
      type: 'mappoint',
      name: 'Police Department',
      data: map_data[5],
      joinBy: null,
      shadow: false,
      turboThreshold: 0,
      showInLegend: false,
      marker: {
        width: MARKER_RADIUS,
        height: MARKER_RADIUS,
        symbol: 'url({{ asset("/images/police-marker-b.svg") }})'
      },
      dataLabels: {
        formatter: function () {
          return '';
        }
      },
      events: {
        click: function (e) {
          if (e.point && typeof e.point.className !== 'undefined') {
            var loc = e.point.className.replace('location-', '');

            if (loc && window.leftMouseClicked) {
              window.location = '/' +  e.point.stateAbbr + '/' + map_type + '/' + loc;
              e.preventDefault();
              e.stopImmediatePropagation();
            }
          }
        }
      }
    });

    // C GRADE
    window.SCORECARD_MAP.addSeries({
      id: 'grade-c',
      animation: false,
      type: 'mappoint',
      name: 'Police Department',
      data: map_data[4],
      joinBy: null,
      shadow: false,
      turboThreshold: 0,
      showInLegend: false,
      marker: {
        width: MARKER_RADIUS,
        height: MARKER_RADIUS,
        symbol: 'url({{ asset("/images/police-marker-c.svg") }})'
      },
      dataLabels: {
        formatter: function () {
          return '';
        }
      },
      events: {
        click: function (e) {
          if (e.point && typeof e.point.className !== 'undefined') {
            var loc = e.point.className.replace('location-', '');

            if (loc && window.leftMouseClicked) {
              window.location = '/' +  e.point.stateAbbr + '/' + map_type + '/' + loc;
              e.preventDefault();
              e.stopImmediatePropagation();
            }
          }
        }
      }
    });

    // D GRADE
    window.SCORECARD_MAP.addSeries({
      id: 'grade-d',
      animation: false,
      type: 'mappoint',
      name: 'Police Department',
      data: map_data[3],
      joinBy: null,
      shadow: false,
      turboThreshold: 0,
      showInLegend: false,
      marker: {
        width: MARKER_RADIUS,
        height: MARKER_RADIUS,
        symbol: 'url({{ asset("/images/police-marker-d.svg") }})'
      },
      dataLabels: {
        formatter: function () {
          return '';
        }
      },
      events: {
        click: function (e) {
          if (e.point && typeof e.point.className !== 'undefined') {
            var loc = e.point.className.replace('location-', '');

            if (loc && window.leftMouseClicked) {
              window.location = '/' +  e.point.stateAbbr + '/' + map_type + '/' + loc;
              e.preventDefault();
              e.stopImmediatePropagation();
            }
          }
        }
      }
    });

    // F GRADE
    window.SCORECARD_MAP.addSeries({
      id: 'grade-f',
      animation: false,
      type: 'mappoint',
      name: 'Police Department',
      data: map_data[2],
      joinBy: null,
      shadow: false,
      turboThreshold: 0,
      showInLegend: false,
      marker: {
        width: MARKER_RADIUS,
        height: MARKER_RADIUS,
        symbol: 'url({{ asset("/images/police-marker-f.svg") }})'
      },
      dataLabels: {
        formatter: function () {
          return '';
        }
      },
      events: {
        click: function (e) {
          if (e.point && typeof e.point.className !== 'undefined') {
            var loc = e.point.className.replace('location-', '');

            if (loc && window.leftMouseClicked) {
              window.location = '/' +  e.point.stateAbbr + '/' + map_type + '/' + loc;
              e.preventDefault();
              e.stopImmediatePropagation();
            }
          }
        }
      }
    });

    // F MINUS GRADE
    window.SCORECARD_MAP.addSeries({
      id: 'grade-f-minus',
      animation: false,
      type: 'mappoint',
      name: 'Police Department',
      data: map_data[1],
      joinBy: null,
      shadow: false,
      turboThreshold: 0,
      showInLegend: false,
      marker: {
        width: MARKER_RADIUS,
        height: MARKER_RADIUS,
        symbol: 'url({{ asset("/images/police-marker-f-minus.svg") }})'
      },
      dataLabels: {
        formatter: function () {
          return '';
        }
      },
      events: {
        click: function (e) {
          if (e.point && typeof e.point.className !== 'undefined') {
            var loc = e.point.className.replace('location-', '');

            if (loc && window.leftMouseClicked) {
              window.location = '/' +  e.point.stateAbbr + '/' + map_type + '/' + loc;
              e.preventDefault();
              e.stopImmediatePropagation();
            }
          }
        }
      }
    });
  } else if (map_type === 'sheriff' && map_data) {
    window.SCORECARD_MAP.addSeries({
      animation: false,
      name: 'Sheriff Department',
      events: {
        click: function (e) {
          if (e.point && typeof e.point.className !== 'undefined') {
            var loc = e.point.className.replace('location-', '');

            if (loc && window.leftMouseClicked) {
              window.location = '/' +  e.point.stateAbbr + '/' + map_type + '/' + loc;
              e.preventDefault();
              e.stopImmediatePropagation();
            }
          }
        }
      }
    });

    // Wait to load data until after the rest of the site is done loading to prevent page blocking
    setTimeout(function() {
      window.SCORECARD_MAP.series[1].setData(map_data);
      document.getElementById('map-loading').style.display = 'none';
    }, 0);
  }

  var $deadlyForceChart = document.getElementById('deadly-force-chart');
  var $chartMiniPeopleKilled = document.getElementById('chart-mini-people-killed');
  var $chartMiniComplaintsReported = document.getElementById('chart-mini-complaints-reported');

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
      responsive: true,
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
            useHTML: true,
            overflow: 'allow',
            crop: false,
            style: {
              fontSize: document.documentElement.clientWidth > 940 ? '12px' : '10px',
              fontFamily: 'Verdana, sans-serif',
              textTransform: 'uppercase'
            }
          }
        }
      },
      series: [{
        data: [
          ['Black', {{ (!isset($nationalSummary['total_black_population']) || $nationalSummary['total_black_population'] === 0) ? 0 : round(($nationalSummary['total_black_people_killed'] / $nationalSummary['total_black_population']) * 100, 2) }}],
          ['Latinx', {{ (!isset($nationalSummary['total_hispanic_population']) || $nationalSummary['total_hispanic_population'] === 0) ? 0 : round(($nationalSummary['total_hispanic_people_killed'] / $nationalSummary['total_hispanic_population']) * 100, 2) }}],
          ['White', {{ (!isset($nationalSummary['total_white_population']) || $nationalSummary['total_white_population'] === 0) ? 0 : round(($nationalSummary['total_white_people_killed'] / $nationalSummary['total_white_population']) * 100, 2) }}]
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
      responsive: true,
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
            CHART_MINI_REPORTED
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

  setTimeout(PoliceScorecard.animate, 250);
});
</script>

/**
 * Police Scorecard
 * (c) 2020 JoinCampaignZero.org
 * License: https://github.com/campaignzero/police-scorecard/blob/master/README
 */
window.PoliceScorecardHome = window.PoliceScorecardHome || (function() {
    var mapPopup, lookupTable, hoveredStateId;

    function loadDeadlyForceChart() {
        var $deadlyForceChart = document.getElementById('deadly-force-chart');

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
                                return ' ' + data['labels'][tooltip.index] + ': ' + data['datasets']
                                    [tooltip.datasetIndex]['data'][tooltip.index] + '%';
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
    }

    function loadMiniPeopleKilledChart() {
        var $chartMiniPeopleKilled = document.getElementById('chart-mini-people-killed');

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
                        ['Black', barChartData.black],
                        ['Latinx', barChartData.latinx],
                        ['White', barChartData.white]
                    ]
                }]
            });
        }
    }

    function loadMiniComplaintsReportedChart() {
        var $chartMiniComplaintsReported = document.getElementById('chart-mini-complaints-reported');

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

            var label = ((CHART_MINI_SUSTAINED === 0 && CHART_MINI_REPORTED === 0) || CHART_MINI_REPORTED ===
                0) ? '0' : Math.round((CHART_MINI_SUSTAINED / CHART_MINI_REPORTED) * 100);
            document.getElementById('chart-mini-complaints-reported-label').innerHTML = label + '%';
        }
    }

    function createMapMarkers(mapOption) {
        // Add Mapbox Boundaries source for county polygons.
        mapOption.addSource('stateData', {
            type: 'vector',
            url: 'mapbox://mapbox.boundaries-adm1-v3'
        });

        // Add Layer to Map
        mapOption.addLayer({
            'id': 'state-join',
            'type': 'fill',
            'source': 'stateData',
            'source-layer': 'boundaries_admin_1',
            'paint': {
                'fill-color': '#FFFFFF'
            }
        }, 'admin-0-country-borders');

        // Set Layout Properties
        mapOption.setLayoutProperty('complete-police-departments', 'icon-size', 0.15);

        // Change the cursor to a pointer when the mouse is over the places layer.
        mapOption.on('mousemove', function(e) {
            var features = mapOption.queryRenderedFeatures(e.point, {
                layers: ['complete-police-departments']
            });

            if (!features.length) {
                if (mapPopup) {
                    mapPopup.remove();
                }
                mapOption.getCanvas().style.cursor = '';
                mapOption.setLayoutProperty('complete-police-departments', 'icon-size', 0.15);
                return
            }

            // Get attributes setup for popup
            var coordinates = features[0].geometry.coordinates.slice();
            var name = features[0].properties.name;
            var type = features[0].properties.type;
            var score = features[0].properties.score;
            var grade = features[0].properties.grade;
            var complete = features[0].properties.complete;

            // Increase icon size when hovered over
            mapOption.setLayoutProperty('complete-police-departments', 'icon-size', ['match', ['get', 'name'], features[0].properties.name, 0.5, 0.15]);

            // Update anchor coordinates for popup if needed
            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
            }

            var incomplete = (typeof complete === 'boolean' && !complete) ? '<span class="incomplete">*</span>' : '';
            var incompleteNote = (typeof complete === 'boolean' && !complete) ? '<div class="incomplete-data">* Incomplete Data</div>' : '';
            var popupHTML = '<div class="type">' + type.replace('-', ' ') + '</div><div class="name">' + name + incomplete + '</div><div class="score">' + score + '%</div>' + incompleteNote;

            mapPopup.setLngLat(coordinates)
                .setHTML(popupHTML)
                .addTo(mapOption)
                .addClassName('grade-' + grade);
        });

        // Change the cursor to a pointer when the mouse is over the places layer.
        mapOption.on('mouseenter', 'complete-police-departments', function(e) {
            mapOption.getCanvas().style.cursor = 'pointer';
        });

        // Change it back to a pointer when it leaves.
        mapOption.on('mouseleave', 'complete-police-departments', function(e) {
            mapOption.getCanvas().style.cursor = '';
        });

        mapOption.on('click', 'complete-police-departments', function(e) {
            if (document.getElementById('usa-map').clientWidth > 720) {
                var features = mapOption.queryRenderedFeatures(e.point, {
                    layers: ['complete-police-departments']
                });

                if (!features.length) {
                    mapOption.getCanvas().style.cursor = 'pointer';
                    mapOption.setLayoutProperty('complete-police-departments', 'icon-size', 0.15);
                    return;
                }

                // Prevent Map Click Event Bubbling
                if (e.originalEvent) {
                    e.originalEvent.cancelBubble = true;
                    e.originalEvent.preventDefault();
                    e.originalEvent.stopPropagation();
                    e.originalEvent.stopImmediatePropagation();
                }

                window.location = features[0].properties.url;

                return false;
            }
        });

    }

    function createSheriffCounties(mapOption) {
        let url = '/api/map/us/sheriff';

        fetch(url).then(res => res.json()).then((out) => {
            sheriffData = out;
            createViz(lookupTable);
        }).catch(err => {
            throw err
        });

        const createViz = (table) => {
            // Create Lookup Table for MapBox Boundaries
            const fipsBoundaries = filterLookupTable(table);

            // Add Mapbox Boundaries source for county polygons.
            mapOption.addSource('countyData', {
                type: 'vector',
                url: 'mapbox://mapbox.boundaries-adm2-v3'
            });

            // Add layer from the vector tile source with data-driven style
            // Use a feature-state dependent expression to compute the darker gray fill color for those
            // that are "complete"
            mapOption.addLayer({
                id: 'county-join',
                type: 'fill',
                source: 'countyData',
                'source-layer': 'boundaries_admin_2',
                paint: {
                    'fill-color': [
                        "case",
                        [
                            "==",
                            ['feature-state', 'enableHover'],
                            true
                        ],
                        "rgba(150,150,150,0.59)",
                        [
                            '==',
                            ['feature-state', 'enableHover'],
                            false
                        ],
                        "rgba(255,255,255,0.99)",
                        "rgba(255,255,255,0.99)"
                    ]
                }
            }, 'admin-0-country-borders');

            // highlight counties on hover that are "complete" in the data
            mapOption.addLayer({
                'id': 'county-fills',
                'type': 'fill',
                'source': 'countyData',
                'source-layer': 'boundaries_admin_2',
                'paint': {
                    'fill-color': [
                        'case',
                        ['all',
                            ['boolean', ['feature-state', 'hover'], false],
                            ['boolean', ['feature-state', 'enableHover'], true]
                        ],
                        '#666666',
                        'rgba(255,255,255,0.99)'
                    ],
                    'fill-opacity': [
                        'case',
                        ['boolean', ['feature-state', 'hover'], false],
                        1,
                        0.5
                    ]
                }
            }, 'admin-0-country-borders');

            // Join the sheriff data with the lookup data based on FIPS code
            function setCounties() {
                const missingRequiredData = !fipsBoundaries || !sheriffData || typeof sheriffData.features === 'undefined';
                if (missingRequiredData) {
                    return false;
                }

                sheriffData.features.forEach(function(row) {
                    // validate Mapping of FIPS data before using it
                    const hasFipsData = typeof row.properties !== 'undefined' && typeof row.properties.fips !== 'undefined' && typeof fipsBoundaries[row.properties.fips] !== 'undefined';
                    if (hasFipsData) {
                        window.PoliceScorecardHome.map.setFeatureState({
                            source: 'countyData',
                            sourceLayer: 'boundaries_admin_2',
                            id: fipsBoundaries[row.properties.fips].feature_id
                        }, {
                            complete: row.properties.complete,
                            enableHover: row.properties.enableHover,
                            name: row.properties.name,
                            type: row.properties.type,
                            score: row.properties.score,
                            grade: row.properties.grade,
                            url: row.properties.url
                        });
                    }
                });

                // Hide Map Loader
                document.getElementById('map-loading').style.display = 'none';
            }

            // Check if `countyData` source is loaded.
            function setAfterLoad(e) {
                if (e.sourceId === 'countyData' && e.isSourceLoaded) {
                    setCounties();
                    mapOption.off('sourcedata', setAfterLoad);
                }
            }

            // If `countyData` source is loaded, call `setCounties()`.
            if (mapOption.isSourceLoaded('countyData')) {
                setCounties();
            } else {
                mapOption.on('sourcedata', setAfterLoad);
            }


            // When a mouse move occurs on a feature in the places layer, open a popup at the
            // location of the feature, with HTML from its properties/state.
            mapOption.on('mousemove', 'county-join', function(e) {
                var features = mapOption.queryRenderedFeatures(e.point, {
                    layers: ['county-join']
                });
                mapOption.getCanvas().style.cursor = 'pointer';

                if (!features.length || features[0].properties.iso_3166_1 != 'US' || !features[0].state.hasOwnProperty('name') || !features[0].state.hasOwnProperty('score')) {
                    mapOption.getCanvas().style.cursor = '';
                    mapPopup.remove();
                    return
                }

                // Get attributes setup for popup
                var coordinates = features[0].geometry.coordinates.slice();
                var name = features[0].state.name;
                var type = features[0].state.type;
                var score = features[0].state.score;
                var grade = features[0].state.grade;
                var complete = features[0].state.complete;

                // Ensure that if the map is zoomed out such that multiple
                // copies of the feature are visible, the popup appears
                // over the copy being pointed to.
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                var incomplete = (typeof complete === 'boolean' && !complete) ? '<span class="incomplete">*</span>' : '';
                var incompleteNote = (typeof complete === 'boolean' && !complete) ? '<div class="incomplete-data">* Incomplete Data</div>' : '';
                var popupHTML = '<div class="type">' + type.replace('-', ' ') + '</div><div class="name">' + name + incomplete + '</div><div class="score">' + score + '%</div>' + incompleteNote;

                mapPopup.setLngLat(coordinates[0][0])
                    .setHTML(popupHTML)
                    .addTo(mapOption)
                    .addClassName('grade-' + grade);
            });

            // Change it back to a pointer when it leaves.
            mapOption.on('mouseleave', 'county-join', function() {
                mapOption.getCanvas().style.cursor = '';
            });


            // When the user moves their mouse over the county-join layer, we'll update the
            // feature state for the feature under the mouse.
            mapOption.on('mousemove', 'county-join', function(e) {
                if (e.features.length > 0 && e.features[0].properties.iso_3166_1 == 'US') {
                    if (hoveredStateId) {
                        mapOption.setFeatureState({
                            source: 'countyData',
                            sourceLayer: 'boundaries_admin_2',
                            id: hoveredStateId
                        }, {
                            hover: false
                        });
                    }
                    hoveredStateId = e.features[0].id;
                    mapOption.setFeatureState({
                        source: 'countyData',
                        sourceLayer: 'boundaries_admin_2',
                        id: hoveredStateId
                    }, {
                        hover: true
                    });
                }
            });

            // When the mouse leaves the county-join layer, update the feature state of the
            // previously hovered feature.
            mapOption.on('mouseleave', 'county-join', function() {
                if (hoveredStateId) {
                    mapOption.setFeatureState({
                        source: 'countyData',
                        sourceLayer: 'boundaries_admin_2',
                        id: hoveredStateId
                    }, {
                        hover: false
                    });
                }
                hoveredStateId = null;

                mapPopup.remove();
            });

            mapOption.on('click', 'county-join', function(e) {
                if (document.getElementById('usa-map').clientWidth > 720) {
                    var features = mapOption.queryRenderedFeatures(e.point, {
                        layers: ['county-join']
                    });

                    const hasNoCountyData = !features.length || typeof features[0].state === 'undefined' || typeof features[0].state.url === 'undefined';
                    if (hasNoCountyData) {
                        mapOption.getCanvas().style.cursor = 'pointer';
                        return;
                    }

                    // Prevent Map Click Event Bubbling
                    if (e.originalEvent) {
                        e.originalEvent.cancelBubble = true;
                        e.originalEvent.preventDefault();
                        e.originalEvent.stopPropagation();
                        e.originalEvent.stopImmediatePropagation();
                    }

                    window.location = features[0].state.url;

                    return false;
                }
            });
        }

        // Filters the lookup table to features with the 'US' country code
        // and keys the table using the `unit_code` property that will be used for the join
        const filterLookupTable = (lookupTable) => {

            let lookupData = {};

            for (layer in lookupTable) {
                for (worldview in lookupTable[layer].data) {
                    for (feature in lookupTable[layer].data[worldview]) {
                        let featureData = lookupTable[layer].data[worldview][feature];

                        // Filter the lookup data for the US
                        if (featureData.iso_3166_1 == 'US') {
                            // Use `unit_code` property that has the FIPS code as the lookup key
                            lookupData[featureData['unit_code']] = featureData;
                        }
                    }
                }
            }
            return lookupData;
        }
    }

    function loadMapBox() {
        if (typeof MB !== 'undefined' && typeof mapboxgl !== 'undefined') {
            if (MB.type === 'police-department') {
                loadPoliceMap();
            } else if (MB.type === 'sheriff') {
                loadSheriffMap();
            }
        }
    }

    /**
     * Load Police Map
     */
    function loadPoliceMap() {
        var $mapLoading = document.getElementById('map-loading');
        var $mapElm = document.getElementById('usa-map');
        var $mapAlaskaElm = document.getElementById('alaska-overlay');
        var $mapHawaiiOverlayElm = document.getElementById('hawaii-overlay');

        $mapLoading.style.display = 'block';

        mapboxgl.accessToken = MB.token;

        var mapWrapperView = function(w, h) {
            return geoViewport.viewport([-126.5, 26, -65, 50], [w, h]); // [ left, bottom, right, top ]
        };

        var mapAlaskaView = function(w, h) {
            return geoViewport.viewport([-180, 59, -125, 70], [w, h]);
        };

        var mapHawaiiView = function(w, h) {
            return geoViewport.viewport([-162.5, 17.75, -152, 23], [w, h]);
        };

        var mapWrapper = mapWrapperView($mapElm.clientWidth / 2, $mapElm.clientHeight / 2);
        var mapAlaska = mapAlaskaView($mapAlaskaElm.clientWidth / 2, $mapAlaskaElm.clientHeight / 2);
        var mapHawaii = mapHawaiiView($mapHawaiiOverlayElm.clientWidth / 2, $mapHawaiiOverlayElm.clientHeight / 2);

        var mapZoom = ($mapElm.clientWidth > 720) ? 1.4 : 1.05;

        var map = new mapboxgl.Map({
            center: mapWrapper.center,
            container: 'usa-map',
            style: 'mapbox://styles/policescorecard/ckdq6vklx0q3r1iqrwpiris3f?fresh=true',
            interactive: false,
            zoom: mapWrapper.zoom * mapZoom
        });

        var alaskaOverlay = new mapboxgl.Map({
            center: mapAlaska.center,
            container: 'alaska-overlay',
            style: 'mapbox://styles/policescorecard/ckdq6vklx0q3r1iqrwpiris3f?fresh=true',
            interactive: false,
            zoom: 0.6
        });

        var hawaiiOverlay = new mapboxgl.Map({
            center: mapHawaii.center,
            container: 'hawaii-overlay',
            style: 'mapbox://styles/policescorecard/ckdq6vklx0q3r1iqrwpiris3f?fresh=true',
            interactive: false,
            zoom: 3
        });

        mapPopup = new mapboxgl.Popup({
            closeButton: false,
            closeOnClick: false
        });

        // Fetch Boundaries
        fetch(MB.boundaries).then(res => res.json()).then((out) => {
            lookupTable = out;
        }).catch(err => {
            throw err
        });

        map.on('load', function() {
            createMapMarkers(map);
            $mapLoading.style.display = 'none';
        });

        map.on('resize', function() {
            var mapWrapper = mapWrapperView($mapElm.clientWidth / 2, $mapElm.clientHeight / 2);
            var mapAlaska = mapAlaskaView($mapAlaskaElm.clientWidth / 2, $mapAlaskaElm.clientHeight / 2);
            var mapHawaii = mapHawaiiView($mapHawaiiOverlayElm.clientWidth / 2, $mapHawaiiOverlayElm.clientHeight / 2);

            var mapZoom = ($mapElm.clientWidth > 720) ? 1.4 : 1.05;

            map.setCenter(mapWrapper.center);
            map.setZoom(mapWrapper.zoom * mapZoom);

            alaskaOverlay.setCenter(mapAlaska.center);
            alaskaOverlay.setZoom(0.6);

            hawaiiOverlay.setCenter(mapHawaii.center);
            hawaiiOverlay.setZoom(3);
        });

        alaskaOverlay.on('load', function() {
            createMapMarkers(alaskaOverlay);
        });

        hawaiiOverlay.on('load', function() {
            createMapMarkers(hawaiiOverlay);
        });

        // Export Maps to Window Object
        window.PoliceScorecardHome.map = map;
        window.PoliceScorecardHome.alaskaOverlay = alaskaOverlay;
        window.PoliceScorecardHome.hawaiiOverlay = hawaiiOverlay;
    }

    /**
     * Load Sheriff Map
     */
    function loadSheriffMap() {
        var $mapLoading = document.getElementById('map-loading');
        var $mapElm = document.getElementById('usa-map');
        var $mapAlaskaElm = document.getElementById('alaska-overlay');
        var $mapHawaiiOverlayElm = document.getElementById('hawaii-overlay');

        $mapLoading.style.display = 'block';

        mapboxgl.accessToken = MB.token;

        var mapWrapperView = function(w, h) {
            return geoViewport.viewport([-126.5, 26, -65, 50], [w, h]);
        };

        var mapAlaskaView = function(w, h) {
            return geoViewport.viewport([-180, 59, -125, 70], [w, h]);
        };

        var mapHawaiiView = function(w, h) {
            return geoViewport.viewport([-162.5, 17.75, -152, 23], [w, h]);
        };

        var mapWrapper = mapWrapperView($mapElm.clientWidth / 2, $mapElm.clientHeight / 2);
        var mapAlaska = mapAlaskaView($mapAlaskaElm.clientWidth / 2, $mapAlaskaElm.clientHeight / 2);
        var mapHawaii = mapHawaiiView($mapHawaiiOverlayElm.clientWidth / 2, $mapHawaiiOverlayElm.clientHeight / 2);

        var mapZoom = ($mapElm.clientWidth > 720) ? 1.4 : 1.05;

        // Fetch Boundaries
        fetch(MB.boundaries).then(res => res.json()).then((out) => {
            lookupTable = out;
        }).catch(err => {
            throw err
        });

        // USA Map
        var map = new mapboxgl.Map({
            center: mapWrapper.center,
            container: 'usa-map',
            style: 'mapbox://styles/policescorecard/ckdtcnr2u02jo19mq0dj7n45r?fresh=true',
            interactive: false,
            zoom: mapWrapper.zoom * mapZoom
        });

        // Alaska Map
        var alaskaOverlay = new mapboxgl.Map({
            center: mapAlaska.center,
            container: 'alaska-overlay',
            style: 'mapbox://styles/policescorecard/ckdtcnr2u02jo19mq0dj7n45r?fresh=true',
            interactive: false,
            zoom: 0.6
        });

        // Hawaii Map
        var hawaiiOverlay = new mapboxgl.Map({
            center: mapHawaii.center,
            container: 'hawaii-overlay',
            style: 'mapbox://styles/policescorecard/ckdtcnr2u02jo19mq0dj7n45r?fresh=true',
            interactive: false,
            zoom: 3
        });

        // Popup Tooltip
        mapPopup = new mapboxgl.Popup({
            closeButton: false,
            closeOnClick: false
        });

        map.on('load', function() {
            createSheriffCounties(map);
        });

        map.on('resize', function() {
            var mapWrapper = mapWrapperView($mapElm.clientWidth / 2, $mapElm.clientHeight / 2);
            var mapAlaska = mapAlaskaView($mapAlaskaElm.clientWidth / 2, $mapAlaskaElm.clientHeight / 2);
            var mapHawaii = mapHawaiiView($mapHawaiiOverlayElm.clientWidth / 2, $mapHawaiiOverlayElm.clientHeight / 2);

            var mapZoom = ($mapElm.clientWidth > 720) ? 1.4 : 1.05;

            map.setCenter(mapWrapper.center);
            map.setZoom(mapWrapper.zoom * mapZoom);

            alaskaOverlay.setCenter(mapAlaska.center);
            alaskaOverlay.setZoom(0.6);

            hawaiiOverlay.setCenter(mapHawaii.center);
            hawaiiOverlay.setZoom(3);
        });

        alaskaOverlay.on('load', function() {
            createSheriffCounties(alaskaOverlay);
        });

        hawaiiOverlay.on('load', function() {
            createSheriffCounties(hawaiiOverlay);
        });

        // Export Maps to Window Object
        window.PoliceScorecardHome.map = map;
        window.PoliceScorecardHome.alaskaOverlay = alaskaOverlay;
        window.PoliceScorecardHome.hawaiiOverlay = hawaiiOverlay;
    }

    function init() {
        loadMapBox();
        loadDeadlyForceChart();
        loadMiniPeopleKilledChart();
        loadMiniComplaintsReportedChart();
    }

    return {
        init: init
    }
})();

window.addEventListener('load', function() {
    PoliceScorecardHome.init();
});

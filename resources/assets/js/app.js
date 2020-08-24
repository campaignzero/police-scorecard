/**
 * Police Scorecard
 * (c) 2020 JoinCampaignZero.org
 * License: https://github.com/campaignzero/police-scorecard/blob/master/README
 */
window.PoliceScorecard = {
    /**
     * Developer Flags
     */
    devFlags: {
        debug: false
    },

    /**
     * DOM Elements used by App
     */
    elm: {},

    /**
     * Animate Everything
     */
    animate: function() {
        PoliceScorecard.animateProgressBars();
        PoliceScorecard.animateCheckMarks();
    },

    /**
     * Animate Check Marks
     */
    animateCheckMarks: function() {
        PoliceScorecard.elm.$checks = document.getElementsByClassName('animate-check');

        Array.prototype.forEach.call(PoliceScorecard.elm.$checks, function(el) {
            if (PoliceScorecard.isScrolledIntoView(el)) {
                el.classList.remove('animate-check');
            }
        });
    },

    /**
     * Animate Progress Bars
     */
    animateProgressBars: function() {
        PoliceScorecard.elm.$progressBars = document.getElementsByClassName('animate-bar');

        Array.prototype.forEach.call(PoliceScorecard.elm.$progressBars, function(el) {
            if (PoliceScorecard.isScrolledIntoView(el)) {
                var percent = el.getAttribute('data-percent');
                el.style.width = percent;
                el.classList.remove('animate-bar');
            }
        });
    },

    /**
     * Bind Events to DOM Elements
     */
    bindEvents: function() {
        // Cache Element Lookups
        PoliceScorecard.elm.$citySelect = document.getElementById('city-select');
        PoliceScorecard.elm.$mainWrapper = document.getElementById('main');
        PoliceScorecard.elm.$menu = document.getElementById('menu');
        PoliceScorecard.elm.$menuToggle = document.getElementById('mobile-toggle');
        PoliceScorecard.elm.$modal = document.getElementById('modal-wrapper');
        PoliceScorecard.elm.$modalClose = document.getElementById('modal-close');
        PoliceScorecard.elm.$modalContent = document.getElementById('modal-content');
        PoliceScorecard.elm.$modalLabel = document.getElementById('modal-label');
        PoliceScorecard.elm.$modalOverlay = document.getElementById('overlay');
        PoliceScorecard.elm.$modalTabs = document.getElementById('modal-header-tabs');
        PoliceScorecard.elm.$moreInfo = document.getElementsByClassName('more-info');
        PoliceScorecard.elm.$moreInfoContent = document.getElementById('more-info-content');
        PoliceScorecard.elm.$resultsInfo = document.getElementsByClassName('results-info');
        PoliceScorecard.elm.$resultsInfoContent = document.getElementById('results-info-content');
        PoliceScorecard.elm.$scoreCard = document.getElementById('score-card');
        PoliceScorecard.elm.$scoreLocation = document.getElementById('score-location');
        PoliceScorecard.elm.$selectedCity = document.getElementsByClassName('selected-city');
        PoliceScorecard.elm.$selectedState = document.querySelector('#state-select a.active');
        PoliceScorecard.elm.$showLess = document.getElementById('show-less');
        PoliceScorecard.elm.$showMore = document.getElementById('show-more');
        PoliceScorecard.elm.$showMoreOnly = document.getElementsByClassName('show-more-only');
        PoliceScorecard.elm.$showPolice = document.getElementById('show-police');
        PoliceScorecard.elm.$showSheriff = document.getElementById('show-sheriff');
        PoliceScorecard.elm.$stateMap = document.getElementById('state-map');
        PoliceScorecard.elm.$stateMapLayer = document.getElementById('state-map-layer');
        PoliceScorecard.elm.$stateMapShadow = document.getElementById('state-map-shadow');
        PoliceScorecard.elm.$stateSelect = document.getElementById('state-select');
        PoliceScorecard.elm.$stateSelection = document.getElementById('state-selection');
        PoliceScorecard.elm.$toggleAnimate = document.getElementById('toggle-animate');
        PoliceScorecard.elm.$trackInput = document.querySelectorAll('input[data-track], textarea[data-track], select[data-track]');
        PoliceScorecard.elm.$trackLinks = document.querySelectorAll('a[data-track], button[data-track]');
        PoliceScorecard.elm.$usaMapLayer = document.getElementById('usa-map-layer');

        // Handle Mouse Clicks for Map
        window.leftMouseClicked = false;

        // Track Element with Focus if Modal Opens
        PoliceScorecard.activeFocus = null;

        // Debounce Scroll Animations
        PoliceScorecard.debounce = false;

        // Event Listeners
        if (PoliceScorecard.elm.$menuToggle) {
            PoliceScorecard.elm.$menuToggle.addEventListener('click', function() {
                PoliceScorecard.elm.$menu.classList.toggle('open')
            });
        }

        // Modal Listeners
        if (PoliceScorecard.elm.$modal) {
            PoliceScorecard.elm.$modalClose.addEventListener('click', PoliceScorecard.closeModal);
            PoliceScorecard.elm.$modalOverlay.addEventListener('click', PoliceScorecard.closeModal);

            PoliceScorecard.elm.$modalOverlay.addEventListener('mousewheel', function(e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
            });

            PoliceScorecard.elm.$modalOverlay.addEventListener('touchmove', function(e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
            });

            PoliceScorecard.elm.$modal.addEventListener('mousewheel', function(e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
            });

            PoliceScorecard.elm.$modal.addEventListener('touchmove', function(e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
            });

            PoliceScorecard.elm.$modalContent.addEventListener('mousewheel', function(e) {
                e.stopPropagation();
                e.stopImmediatePropagation();
            });

            PoliceScorecard.elm.$modalContent.addEventListener('touchmove', function(e) {
                e.stopPropagation();
                e.stopImmediatePropagation();
            });
        }

        // State Select Menu
        if (PoliceScorecard.elm.$stateSelection) {
            PoliceScorecard.elm.$stateSelection.addEventListener('click', function() {
                PoliceScorecard.elm.$modalLabel.innerHTML = 'Select a State';
                PoliceScorecard.elm.$modalTabs.style.display = 'none';
                PoliceScorecard.elm.$stateSelect.style.display = 'block';

                PoliceScorecard.openModal();

                if (PoliceScorecard.elm.$citySelect) {
                    PoliceScorecard.elm.$citySelect.style.display = 'none';
                }

                if (PoliceScorecard.elm.$selectedState) {
                    PoliceScorecard.elm.$selectedState.scrollIntoView();
                    PoliceScorecard.elm.$selectedState.focus();
                }
            });
        }

        // State Map
        if (PoliceScorecard.elm.$stateMapLayer) {
            PoliceScorecard.elm.$stateMapLayer.addEventListener('click', function() {
                PoliceScorecard.elm.$modalLabel.innerHTML = 'Select a Department';
                PoliceScorecard.elm.$modalTabs.style.display = 'block';
                PoliceScorecard.elm.$stateSelect.style.display = 'none';

                PoliceScorecard.openModal();

                if (PoliceScorecard.elm.$citySelect) {
                    PoliceScorecard.elm.$citySelect.style.display = 'block';
                }

                if (PoliceScorecard.elm.$selectedCity) {
                    PoliceScorecard.elm.$selectedCity[0].scrollIntoView();
                    PoliceScorecard.elm.$selectedCity[0].focus();
                }
            });
        }

        // USA Map
        if (PoliceScorecard.elm.$usaMapLayer) {
            PoliceScorecard.elm.$usaMapLayer.addEventListener('click', function() {
                PoliceScorecard.elm.$modalLabel.innerHTML = 'Select a State';
                PoliceScorecard.elm.$modalTabs.style.display = 'none';
                PoliceScorecard.elm.$stateSelect.style.display = 'block';

                PoliceScorecard.openModal();

                if (PoliceScorecard.elm.$citySelect) {
                    PoliceScorecard.elm.$citySelect.style.display = 'none';
                }

                if (PoliceScorecard.elm.$selectedState) {
                    PoliceScorecard.elm.$selectedState.scrollIntoView();
                    PoliceScorecard.elm.$selectedState.focus();
                }
            });
        }

        // Location Score
        if (PoliceScorecard.elm.$scoreLocation) {
            PoliceScorecard.elm.$scoreLocation.addEventListener('click', function() {
                PoliceScorecard.elm.$modalLabel.innerHTML = 'Select a Department';
                PoliceScorecard.elm.$modalTabs.style.display = 'block';
                PoliceScorecard.elm.$stateSelect.style.display = 'none';

                PoliceScorecard.openModal();

                if (PoliceScorecard.elm.$citySelect) {
                    PoliceScorecard.elm.$citySelect.style.display = 'block';
                }

                if (PoliceScorecard.elm.$selectedCity) {
                    PoliceScorecard.elm.$selectedCity[0].scrollIntoView();
                    PoliceScorecard.elm.$selectedCity[0].focus();
                }
            });
        }

        // Show Less Button
        if (PoliceScorecard.elm.$showLess) {
            PoliceScorecard.elm.$showLess.addEventListener('click', function() {
                PoliceScorecard.elm.$scoreCard.classList.add('short');

                // Update Accessibility
                Array.prototype.forEach.call(PoliceScorecard.elm.$showMoreOnly, function(el) {
                    el.setAttribute('tabindex', -1);
                    el.setAttribute('aria-hidden', true);
                });
            });
        }

        // Show More Button
        if (PoliceScorecard.elm.$showMore) {
            PoliceScorecard.elm.$showMore.addEventListener('click', function() {
                PoliceScorecard.elm.$scoreCard.classList.remove('short');

                // Update Accessibility
                Array.prototype.forEach.call(PoliceScorecard.elm.$showMoreOnly, function(el) {
                    el.removeAttribute('tabindex');
                    el.removeAttribute('aria-hidden');
                });
            });
        }

        // Show Police Button
        if (PoliceScorecard.elm.$showPolice) {
            PoliceScorecard.elm.$showPolice.addEventListener('click', function() {
                PoliceScorecard.elm.$showPolice.classList.add('active');
                PoliceScorecard.elm.$showSheriff.classList.remove('active');

                PoliceScorecard.elm.$citySelect.classList.add('police-department');
                PoliceScorecard.elm.$citySelect.classList.remove('sheriff');

                PoliceScorecard.elm.$citySelect.scrollTop = 0;
            });
        }

        // Show Sheriff Button
        if (PoliceScorecard.elm.$showSheriff) {
            PoliceScorecard.elm.$showSheriff.addEventListener('click', function() {
                PoliceScorecard.elm.$showSheriff.classList.add('active');
                PoliceScorecard.elm.$showPolice.classList.remove('active');

                PoliceScorecard.elm.$citySelect.classList.add('sheriff');
                PoliceScorecard.elm.$citySelect.classList.remove('police-department');

                PoliceScorecard.elm.$citySelect.scrollTop = 0;
            });
        }

        // Toggle Animation
        if (PoliceScorecard.elm.$toggleAnimate) {
            PoliceScorecard.elm.$toggleAnimate.classList.toggle('animate');
        }

        // Track Links
        Array.prototype.forEach.call(PoliceScorecard.elm.$trackLinks, function(el) {
            el.removeEventListener('click', PoliceScorecard.trackLinks);
            el.addEventListener('click', PoliceScorecard.trackLinks);
        });

        Array.prototype.forEach.call(PoliceScorecard.elm.$trackLinks, function(el) {
            el.removeEventListener('click', PoliceScorecard.trackLinks);
            el.addEventListener('click', PoliceScorecard.trackLinks);
        });

        // Click Event for More Info
        Array.prototype.forEach.call(PoliceScorecard.elm.$moreInfo, function(el) {
            el.addEventListener('click', function(evt) {
                var info = evt.target.getAttribute('data-more-info');

                if (info && typeof SCORECARD_DATA.policy[info] !== 'undefined' && SCORECARD_DATA.policy[info]) {
                    PoliceScorecard.loadMoreInfo(SCORECARD_DATA.policy[info]);
                } else if (typeof info === 'string') {
                    PoliceScorecard.loadMoreInfo(info);
                }
            });
        });

        // Click Event for Results Info
        Array.prototype.forEach.call(PoliceScorecard.elm.$resultsInfo, function(el) {
            el.addEventListener('click', function() {
                PoliceScorecard.loadResultsInfo();
            });
        });

        // Support Mouse Interaction with Mouse Pointer ( Touch events would not work on this map due to close proximity of markers )
        document.body.onmousedown = function(e) {
            if (!e) {
                return;
            }

            // Track if we have a left mouse key down
            window.leftMouseClicked = (typeof e.buttons === 'undefined') ? e.which === 1 : e.buttons === 1;
        };

        // Clear Mouse Down, but leave it on long enough for Map click event to check it's value
        document.body.onmouseup = function() {
            setTimeout(function() {
                window.leftMouseClicked = false;
            }, 100)
        };

        // Handle Progress Bars
        window.onscroll = function() {
            clearTimeout(PoliceScorecard.debounce);
            PoliceScorecard.debounce = setTimeout(PoliceScorecard.animate, 10);
        };

        // Fix bug where if user is already on middle of page, and hits refresh, they will still see animation correctly
        setTimeout(PoliceScorecard.animate, 250);
        setTimeout(PoliceScorecard.animate, 500);
        setTimeout(PoliceScorecard.animate, 1000);
    },

    /**
     * Close Modal
     */
    closeModal: function() {
        if (PoliceScorecard.elm.$modal && PoliceScorecard.elm.$mainWrapper && PoliceScorecard.elm.$mainWrapper.classList.contains('modal-open')) {
            PoliceScorecard.elm.$moreInfoContent.style.display = 'none';
            PoliceScorecard.elm.$resultsInfoContent.style.display = 'none';
            PoliceScorecard.elm.$stateSelect.style.display = 'none';
            PoliceScorecard.elm.$modal.classList.remove('large');
            PoliceScorecard.elm.$modal.classList.remove('open');

            if (PoliceScorecard.elm.$citySelect) {
                PoliceScorecard.elm.$citySelect.style.display = 'block';
            }

            PoliceScorecard.elm.$mainWrapper.classList.remove('modal-open');

            PoliceScorecard.elm.$canFocus = PoliceScorecard.elm.$mainWrapper.querySelectorAll('.focus-disabled');

            Array.prototype.forEach.call(PoliceScorecard.elm.$canFocus, function(el) {
                if (el.dataset.currentIndex === '0') {
                    el.removeAttribute('tabindex');
                } else {
                    el.setAttribute('tabindex', el.dataset.currentIndex);
                }

                delete el.dataset.currentIndex;

                el.classList.remove('focus-disabled');
            });

            // Set Focus back to the Last Focused Item before Modal Opened
            if (PoliceScorecard.activeFocus) {
                PoliceScorecard.activeFocus.focus();
                PoliceScorecard.activeFocus = null;
            }

            document.removeEventListener('keydown', PoliceScorecard.escapeKey);
        }
    },

    /**
     * Listen for Escape Key
     * @param {*} evt
     */
    escapeKey: function(evt) {
        if (evt.keyCode == 27) {
            PoliceScorecard.closeModal();
        }
    },

    /**
     * Get Grade from Score
     * @param {*} score
     */
    getGrade: function(score) {
        score = parseInt(score);

        if (score <= 59) {
            return 'F';
        } else if (score <= 62 && score >= 60) {
            return 'D-';
        } else if (score <= 66 && score >= 63) {
            return 'D';
        } else if (score <= 69 && score >= 67) {
            return 'D+';
        } else if (score <= 72 && score >= 70) {
            return 'C-';
        } else if (score <= 76 && score >= 73) {
            return 'C';
        } else if (score <= 79 && score >= 77) {
            return 'C+';
        } else if (score <= 82 && score >= 80) {
            return 'B-';
        } else if (score <= 86 && score >= 83) {
            return 'B';
        } else if (score <= 89 && score >= 87) {
            return 'B+';
        } else if (score <= 92 && score >= 90) {
            return 'A-';
        } else if (score <= 97 && score >= 93) {
            return 'A';
        } else if (score >= 98) {
            return 'A+';
        }
    },

    /**
     * Initialize App
     */
    init: function() {
        PoliceScorecard.bindEvents();
    },

    /**
     * Check if Element is Scrolled Into View
     * @param {*} el
     */
    isScrolledIntoView: function(el) {
        var bounding = el.getBoundingClientRect();

        return (
            bounding.top >= 0 &&
            bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight)
        );
    },

    /**
     * Load Map for State Abbreviation
     * @param {*} abbr
     */
    loadMap: function(abbr) {
        // Create the chart
        if (PoliceScorecard.elm.$stateMap && PoliceScorecard.elm.$stateMapShadow) {
            window.SCORECARD_MAP = Highcharts.mapChart('state-map', {
                chart: {
                    animation: false,
                    backgroundColor: 'transparent',
                    borderWidth: 0,
                    margin: 5,
                    zoomType: false,
                    styleMode: true,
                    events: {
                        load: function() {
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
                    formatter: function() {
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
                        mapData: Highcharts.maps['countries/us/us-' + abbr.toLowerCase() + '-all'],
                    },
                    series: {
                        stickyTracking: false,
                        animation: false,
                        clip: false,
                        states: {
                            hover: {
                                halo: {
                                    size: 12,
                                    attributes: {
                                        zIndex: 500,
                                        opacity: 1,
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
                series: [{
                    animation: false,
                    allAreas: true,
                    showInLegend: true
                }]
            });

            // Add Map Shadow
            Highcharts.mapChart('state-map-shadow', {
                chart: {
                    animation: false,
                    backgroundColor: 'transparent',
                    borderWidth: 0,
                    margin: 5,
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
                        mapData: Highcharts.maps['countries/us/us-' + abbr.toLowerCase() + '-all'],
                    },
                    series: {
                        animation: false,
                        shadow: false,
                        clip: false
                    }
                },
                series: [{
                    animation: false,
                    allAreas: true,
                    showInLegend: true
                }]
            });

            if (map_data && map_data.selected && map_data.selected.type === 'sheriff') {
                window.SCORECARD_MAP.addSeries({
                    animation: false,
                    data: map_data.sheriff,
                    name: 'Sheriff Department',
                    events: {
                        click: function(e) {
                            if (e.point && typeof e.point.className !== 'undefined') {
                                var loc = e.point.className.replace('location-', '');

                                if (loc && window.leftMouseClicked) {
                                    window.location = '/' + SCORECARD_STATE + '/' + map_data.selected.type + '/' + loc;
                                    e.preventDefault();
                                    e.stopImmediatePropagation();
                                }
                            }
                        }
                    }
                })
            }

            if (map_data && map_data.city && map_data.selected && map_data.selected.type === 'police-department') {
                var MARKER_RADIUS = 8;

                window.SCORECARD_MAP.addSeries({
                    animation: false,
                    data: map_data.sheriff,
                    name: 'Police Department',
                    events: {
                        click: function(e) {
                            if (e.point && typeof e.point.className !== 'undefined') {
                                var loc = e.point.className.replace('location-', '');

                                if (loc && window.leftMouseClicked) {
                                    window.location = '/' + SCORECARD_STATE + '/' + map_data.selected.type + '/' + loc;
                                    e.preventDefault();
                                    e.stopImmediatePropagation();
                                }
                            }
                        }
                    }
                });

                // INCOMPLETE GRADE
                window.SCORECARD_MAP.addSeries({
                    id: 'grade-incomplete',
                    animation: false,
                    type: 'mappoint',
                    name: 'Police Department',
                    data: map_data.city[0],
                    zIndex: 2,
                    marker: {
                        width: MARKER_RADIUS,
                        height: MARKER_RADIUS,
                        symbol: 'url(/images/police-marker-incomplete.svg)'
                    },
                    dataLabels: {
                        formatter: function() {
                            return '';
                        }
                    },
                    events: {
                        click: function(e) {
                            if (e.point && typeof e.point.className !== 'undefined') {
                                var loc = e.point.className.replace('location-', '');

                                if (loc && window.leftMouseClicked) {
                                    window.location = '/' + SCORECARD_STATE + '/' + map_data.selected.type + '/' + loc;
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
                    data: map_data.city[5],
                    zIndex: 3,
                    marker: {
                        width: MARKER_RADIUS,
                        height: MARKER_RADIUS,
                        symbol: 'url(/images/police-marker-b.svg)'
                    },
                    dataLabels: {
                        formatter: function() {
                            return '';
                        }
                    },
                    events: {
                        click: function(e) {
                            if (e.point && typeof e.point.className !== 'undefined') {
                                var loc = e.point.className.replace('location-', '');

                                if (loc && window.leftMouseClicked) {
                                    window.location = '/' + SCORECARD_STATE + '/' + map_data.selected.type + '/' + loc;
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
                    data: map_data.city[4],
                    zIndex: 4,
                    marker: {
                        width: MARKER_RADIUS,
                        height: MARKER_RADIUS,
                        symbol: 'url(/images/police-marker-c.svg)'
                    },
                    dataLabels: {
                        formatter: function() {
                            return '';
                        }
                    },
                    events: {
                        click: function(e) {
                            if (e.point && typeof e.point.className !== 'undefined') {
                                var loc = e.point.className.replace('location-', '');

                                if (loc && window.leftMouseClicked) {
                                    window.location = '/' + SCORECARD_STATE + '/' + map_data.selected.type + '/' + loc;
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
                    data: map_data.city[3],
                    zIndex: 5,
                    marker: {
                        width: MARKER_RADIUS,
                        height: MARKER_RADIUS,
                        symbol: 'url(/images/police-marker-d.svg)'
                    },
                    dataLabels: {
                        formatter: function() {
                            return '';
                        }
                    },
                    events: {
                        click: function(e) {
                            if (e.point && typeof e.point.className !== 'undefined') {
                                var loc = e.point.className.replace('location-', '');

                                if (loc && window.leftMouseClicked) {
                                    window.location = '/' + SCORECARD_STATE + '/' + map_data.selected.type + '/' + loc;
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
                    data: map_data.city[2],
                    zIndex: 6,
                    marker: {
                        width: MARKER_RADIUS,
                        height: MARKER_RADIUS,
                        symbol: 'url(/images/police-marker-f.svg)'
                    },
                    dataLabels: {
                        formatter: function() {
                            return '';
                        }
                    },
                    events: {
                        click: function(e) {
                            if (e.point && typeof e.point.className !== 'undefined') {
                                var loc = e.point.className.replace('location-', '');

                                if (loc && window.leftMouseClicked) {
                                    window.location = '/' + SCORECARD_STATE + '/' + map_data.selected.type + '/' + loc;
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
                    data: map_data.city[1],
                    zIndex: 7,
                    marker: {
                        width: MARKER_RADIUS,
                        height: MARKER_RADIUS,
                        symbol: 'url(/images/police-marker-f-minus.svg)'
                    },
                    dataLabels: {
                        formatter: function() {
                            return '';
                        }
                    },
                    events: {
                        click: function(e) {
                            if (e.point && typeof e.point.className !== 'undefined') {
                                var loc = e.point.className.replace('location-', '');

                                if (loc && window.leftMouseClicked) {
                                    window.location = '/' + SCORECARD_STATE + '/' + map_data.selected.type + '/' + loc;
                                    e.preventDefault();
                                    e.stopImmediatePropagation();
                                }
                            }
                        }
                    }
                });

                // A GRADE
                window.SCORECARD_MAP.addSeries({
                    id: 'grade-a',
                    animation: false,
                    type: 'mappoint',
                    name: 'Police Department',
                    data: map_data.city[6],
                    zIndex: 8,
                    marker: {
                        width: MARKER_RADIUS,
                        height: MARKER_RADIUS,
                        symbol: 'url(/images/police-marker-a.svg)'
                    },
                    dataLabels: {
                        formatter: function() {
                            return '';
                        }
                    },
                    events: {
                        click: function(e) {
                            if (e.point && typeof e.point.className !== 'undefined') {
                                var loc = e.point.className.replace('location-', '');

                                if (loc && window.leftMouseClicked) {
                                    window.location = '/' + SCORECARD_STATE + '/' + map_data.selected.type + '/' + loc;
                                    e.preventDefault();
                                    e.stopImmediatePropagation();
                                }
                            }
                        }
                    }
                });

                // Current Location Marker
                window.SCORECARD_MAP.addSeries({
                    id: 'current',
                    type: 'mappoint',
                    name: map_data.selected.name,
                    data: map_data.selected.data,
                    zIndex: 9,
                    className: 'current-marker',
                    marker: {
                        width: 30,
                        height: 30,
                        symbol: map_data.selected.icon
                    }
                });
            }

            var type = PoliceScorecard.elm.$stateMap.classList[0];
            var loc = PoliceScorecard.elm.$stateMap.classList[1];
            var elm;

            if (loc && type === 'police-department') {
                elm = document.querySelector('.highcharts-mappoint-series .location-' + loc)
            } else if (loc && type === 'sheriff') {
                elm = document.querySelector('.highcharts-map-series .location-' + loc);
            }

            if (elm) {
                elm.classList.add('active');
            }
        }
    },

    /**
     * Load More Info Modal with Given Info
     * @param {*} info
     */
    loadMoreInfo: function(info) {
        PoliceScorecard.elm.$modalLabel.innerHTML = '';
        PoliceScorecard.elm.$modalTabs.style.display = 'none';

        if (info) {
            PoliceScorecard.elm.$citySelect.style.display = 'none';
            PoliceScorecard.elm.$stateSelect.style.display = 'none';
            PoliceScorecard.elm.$moreInfoContent.style.display = 'block';
            PoliceScorecard.elm.$moreInfoContent.innerHTML = info.replace(/(?:\r\n|\r|\n)/g, '<br><br>');

            PoliceScorecard.openModal();
        }
    },

    /**
     * Load More Results Info
     */
    loadResultsInfo: function() {
        document.querySelector('a[name="scorecard-at-a-glance"]').scrollIntoView({
            behavior: 'smooth'
        });
    },

    /**
     * Number Formatter
     * @param {*} num
     */
    nFormatter: function(num) {
        num = parseInt(num);

        if (num === 0) {
            return '$0';
        }

        var units = ["k", "M", "B", "T"];
        var order = Math.floor(Math.log(num) / Math.log(1000));
        var unitName = units[(order - 1)];

        // output number remainder + unitName
        var val = parseFloat(num / 1000 ** order).toFixed(2)
        val = val.replace('.00', '')
        val = val.replace('.10', '.1')
        val = val.replace('.20', '.2')
        val = val.replace('.30', '.3')
        val = val.replace('.40', '.4')
        val = val.replace('.50', '.5')
        val = val.replace('.60', '.6')
        val = val.replace('.70', '.7')
        val = val.replace('.80', '.8')
        val = val.replace('.90', '.9')

        return '$' + val + unitName;
    },

    /**
     * Convert Number to String with Commas
     * @param {*} x
     */
    numberWithCommas: function(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },

    /**
     * Open Modal
     */
    openModal: function() {
        PoliceScorecard.activeFocus = document.activeElement;

        if (PoliceScorecard.elm.$modal) {
            PoliceScorecard.elm.$modal.classList.add('open');
            PoliceScorecard.elm.$modalContent.scrollTop = 0;

            PoliceScorecard.elm.$mainWrapper.classList.add('modal-open');

            PoliceScorecard.elm.$canFocus = PoliceScorecard.elm.$mainWrapper.querySelectorAll('a,button,input,div.tab-pane');

            Array.prototype.forEach.call(PoliceScorecard.elm.$canFocus, function(el) {
                el.dataset.currentIndex = el.tabIndex;
                el.setAttribute('tabindex', -1);
                el.classList.add('focus-disabled');
            });

            document.addEventListener('keydown', PoliceScorecard.escapeKey);

            // Focus on first focusable element
            var focusable = PoliceScorecard.elm.$modalContent.querySelectorAll('a, button, input, textarea, select, details, [tabindex]:not([tabindex="-1"])');

            if (focusable) {
                focusable[0].focus();
            }
        }
    },

    /**
     * Track Event using Google Analytics with Anonymized IP Address
     * @param category
     * @param action
     * @param label
     * @param value
     */
    trackEvent: function(category, action, label, value) {
        if (typeof analytics !== 'undefined') {
            analytics('event', action, {
                event_category: category,
                event_label: label,
                value: value
            }, { 'anonymize_ip': true });
        }

        if (PoliceScorecard.devFlags.debug) {
            console.log('Track Event:', category, action, label, value);
        }
    },

    /**
     * Setup Tracking on Input
     * @param event
     */
    trackInput: function(event) {
        var data;

        if (typeof event.target !== 'undefined' && typeof event.target.dataset !== 'undefined' && typeof event.target.dataset.track !== 'undefined') {
            data = event.target.dataset;
        } else if (typeof event.target !== 'undefined' && typeof event.target.parentNode !== 'undefined' && typeof event.target.parentNode.dataset !== 'undefined' && typeof event.target.parentNode.dataset.track !== 'undefined') {
            data = event.target.parentNode.dataset;
        }

        if (typeof data === 'object' && typeof data.category === 'string' && typeof data.action === 'string') {
            PoliceScorecard.trackEvent(data.category, data.action, event.target.value, event.target.value.length);
        }
    },

    /**
     * Setup Tracking on Links
     * @param event
     */
    trackLinks: function(event) {
        var data;

        if (typeof event.target !== 'undefined' && typeof event.target.dataset !== 'undefined' && typeof event.target.dataset.track !== 'undefined') {
            data = event.target.dataset;
        } else if (typeof event.target !== 'undefined' && typeof event.target.parentNode !== 'undefined' && typeof event.target.parentNode.dataset !== 'undefined' && typeof event.target.parentNode.dataset.track !== 'undefined') {
            data = event.target.parentNode.dataset;
        }

        if (typeof data === 'object' && typeof data.category === 'string' && typeof data.action === 'string' && typeof data.label === 'string') {
            PoliceScorecard.trackEvent(data.category, data.action, data.label, data.value);
        }
    },

    /**
     * Toggle History
     * @param {*} show
     */
    toggleHistory: function(show) {
        var police = myBarHistory.getDatasetMeta(0);
        var other = myBarHistory.getDatasetMeta(1);

        PoliceScorecard.elm.$policeButton = document.querySelector('.history-key-police');
        PoliceScorecard.elm.$otherButton = document.querySelector('.history-key-other');

        if (show === 0) {
            police.hidden = false;
            other.hidden = true;
        } else if (show === 1) {
            police.hidden = true;
            other.hidden = false;
        }

        PoliceScorecard.elm.$policeButton.classList.toggle('active');
        PoliceScorecard.elm.$otherButton.classList.toggle('active');

        myBarHistory.update();
    }
};

// Initialize App
window.onload = function() {
    PoliceScorecard.init();
};

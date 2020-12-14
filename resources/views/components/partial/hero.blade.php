<!-- Hero -->
<div class="section bg-dotted current-state" id="content">
    <div class="content">
        <a href="#" id="state-selection" {!! trackData('Nav', 'Hero' , 'State Selection' ) !!}>
            <span class="state-symbol">z</span>
            Nationwide
        </a>
    </div>
</div>

<div class="section hero home pad">
    <div class="content">
        <div class="header-intro home">
            <h1>We obtained data on America's {{ $type === "sheriff" ? num($totalSheriff) : num($totalPolice) }} {{ $type === "sheriff" ? "sheriff's" : "police" }} departments.</h1>

            <h2>Read the <a href="/findings" style="color: #5a6f83; text-decoration: underline; font-weight: 400;" {!! trackData('External Nav', 'Hero' , 'Findings' ) !!}>Findings.</a> See the Data for Each Department.</h2>

            <div class="buttons">
                <a href="/us/police-department" class="btn {{ $type === 'police-department' ? 'active' : '' }}" {!! trackData('Nav', 'Hero' , 'Police Depts' ) !!}>Police Depts</a>
                <a href="/us/sheriff" class="btn {{ $type === 'sheriff' ? 'active' : '' }}" {!! trackData('Nav', 'Hero', 'Sheriffs Depts' ) !!}>Sheriffs Depts</a>
            </div>
        </div>

        <div class="map" id="usa-map-layer">
            <svg style="position: absolute; left: -10000px; top: -10000px;">
                <defs>
                    <filter id="drop-shadow">
                        <feOffset dx='0' dy='0' />
                        <feGaussianBlur stdDeviation='2' result='offset-blur' />
                        <feComposite operator='out' in='SourceGraphic' in2='offset-blur' result='inverse' />
                        <feFlood flood-color='black' flood-opacity='1' result='color' />
                        <feComposite operator='in' in='color' in2='inverse' result='shadow' />
                        <feComposite operator='over' in='shadow' in2='SourceGraphic' />
                    </filter>
                </defs>
            </svg>

            <div id="map-loading">
                <i class="fa fa-spinner fa-spin"></i>&nbsp; Loading {{ $type === "sheriff" ? num($totalSheriff) : num($totalPolice) }} Departments ...
            </div>

            <div id="mapbox-wrapper">
                <div id="attributions">
                    <a href="https://www.mapbox.com/about/maps/" rel="noopener nofollow" target="_blank" {!! trackData('External Nav', 'Map' , 'Mapbox' ) !!}>&copy; Mapbox</a>
                </div>

                <div id="usa-map" class="{{ $type }} {{ $location }}"></div>
                <div id='alaska-overlay' class="{{ $type }} {{ $location }}"></div>
                <div id='hawaii-overlay'class="{{ $type }} {{ $location }}"></div>
            </div>
        </div>
    </div>
</div>

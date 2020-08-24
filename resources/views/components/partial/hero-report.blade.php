<!-- Hero -->
<div class="section bg-dotted current-state"id="content">
  <div class="content">
    <a href="#" id="state-selection" {!! trackData('Nav', 'Hero', 'State Selection') !!}>
      <span class="state-symbol">{{ getStateIcon($state) }}</span>
      {{ getStateName($state) }}
    </a>
  </div>
</div>

<div class="section hero report">
  <div class="content">
    <div class="right">
      <h1>We obtained data on {{ $type === 'sheriff' ? num(count($stateData['sheriff'])) : num(count($stateData['police-department'])) }} {{ getStateName($state)  }} {{ $type === 'sheriff' ? 'sheriff\'s' : 'police' }} departments.</h1>

      @if (isset($stateData['police-department']) && isset($stateData['sheriff']) && count($stateData['police-department']) > 0 && count($stateData['sheriff']) > 0)
      <div class="buttons">
        <a href="{{ $stateData['police-department'][0]['url_pretty'] }}" class="btn {{ $type === 'police-department' ? 'active' : '' }}">Police Depts</a>
        <a href="{{ $stateData['sheriff'][0]['url_pretty'] }}" class="btn {{ $type === 'sheriff' ? 'active' : '' }}">Sheriffs Depts</a>
      </div>
      @endif
    </div>
    <div class="left">
      <div class="map" id="state-map-layer">
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
          <i class="fa fa-spinner fa-spin"></i>&nbsp; Loading Map ...
        </div>
        <div id="state-map" class="{{ $type }} {{ $location }}"></div>
        <div id="state-map-shadow" class="{{ $type }} {{ $location }}"></div>
      </div>
    </div>
    <div class="clear">&nbsp;</div>
  </div>
</div>

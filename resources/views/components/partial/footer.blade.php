<!-- Footer -->
<footer class="section bg-gray footer" role="contentinfo">
    <div class="content">
        <div class="left">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $socialUrl }}&t={{ $socialText }}" class="social" title="Share via Facebook" {!! trackData('Nav', 'Footer', 'Facebook') !!}>
                <span class="sr-only">Share via Facebook</span>
                <i class="fa fa-facebook"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?source={{ $socialUrl }}&text={{ $socialText }}" title="Share via Twitter" class="social" {!! trackData('Nav', 'Footer', 'Twitter') !!}>
                <span class="sr-only">Share via Twitter</span>
                <i class="fa fa-twitter"></i>
            </a>
            <a href="mailto:?subject={{ $socialSubject }}&body={{ $socialText }}" title="Share via Email" class="social" {!! trackData('Nav', 'Footer', 'Email') !!}>
                <span class="sr-only">Share via Email</span>
                <i class="fa fa-envelope"></i>
            </a>
        </div>
        <div class="right">
            <a href="https://staywoke.typeform.com/to/jBvCkB" class="get-involved" rel="noopener" target="_blank" {!! trackData('External Nav', 'Footer', 'Get Involved') !!}>Get Involved</a>
        </div>
    </div>

    <!-- State Selection -->
    <div class="content bt state-list-footer">
        <div class="one-fifth">
        @foreach(array_slice($states, 0, 10) as $key => $departments)
        <a href="/{{ strtolower($key) }}" class="state-link {{ $key === strtoupper($state) ? 'active' : '' }}" title="View Report for {{ getStateName($key) }}'s Largest Police Department" {!! trackData('Nav', 'Footer', getStateName($key)) !!}>
            {{ getStateName($key) }}
        </a>
        @endforeach
        </div>

        <div class="one-fifth">
        @foreach(array_slice($states, 10, 10) as $key => $departments)
        <a href="/{{ strtolower($key) }}" class="state-link {{ $key === strtoupper($state) ? 'active' : '' }}" title="View Report for {{ getStateName($key) }}'s Largest Police Department" {!! trackData('Nav', 'Footer', getStateName($key)) !!}>
            {{ getStateName($key) }}
        </a>
        @endforeach
        </div>

        <div class="one-fifth">
        @foreach(array_slice($states, 20, 10) as $key => $departments)
        <a href="/{{ strtolower($key) }}" class="state-link {{ $key === strtoupper($state) ? 'active' : '' }}" title="View Report for {{ getStateName($key) }}'s Largest Police Department" {!! trackData('Nav', 'Footer', getStateName($key)) !!}>
            {{ getStateName($key) }}
        </a>
        @endforeach
        </div>

        <div class="one-fifth">
        @foreach(array_slice($states, 30, 10) as $key => $departments)
        <a href="/{{ strtolower($key) }}" class="state-link {{ $key === strtoupper($state) ? 'active' : '' }}" title="View Report for {{ getStateName($key) }}'s Largest Police Department" {!! trackData('Nav', 'Footer', getStateName($key)) !!}>
            {{ getStateName($key) }}
        </a>
        @endforeach
        </div>

        <div class="one-fifth">
        @foreach(array_slice($states, 40) as $key => $departments)
        <a href="/{{ strtolower($key) }}" class="state-link {{ $key === strtoupper($state) ? 'active' : '' }}" title="View Report for {{ getStateName($key) }}'s Largest Police Department" {!! trackData('Nav', 'Footer', getStateName($key)) !!}>
            {{ getStateName($key) }}
        </a>
        @endforeach
        </div>
    </div>

    <!-- Powered By -->
    <div class="content bt">
        Nationwide Police Scorecard
    </div>
</footer>

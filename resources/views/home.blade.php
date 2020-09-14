@extends('layouts.app')

@section('title', $title)
@section('description', $description)

@section('styles')
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.css" rel="stylesheet" />
@endsection

@section('content')
    <x-partial.menu />

    <x-partial.hero :type="$type" :total="$total" :totalPolice="$totalPolice" :totalSheriff="$totalSheriff" />

    <x-partial.killings-by-police :type="$type" :scorecard="$scorecard" />

    <x-partial.grades :state="$state" :type="$type" :grades="$grades" />

    <x-partial.about :type="$type" />

    <x-partial.whats-next />

    <x-partial.footer :state="$state" :states="$states" />
@endsection

@section('modal')
    <x-partial.modal :state="$state" :type="$type" :states="$states" />
@endsection

@section('scripts')
    <script>
        var MB = {
            type: '{{ $type }}',
            token: '{{ config("app.mapbox_token") }}',
            boundaries: '{{ asset("/maps/boundaries-adm2-v3-us.json") }}'
        };
        var barChartData = {
            black: {{ (!isset($scorecard['total_black_population']) || $scorecard['total_black_population'] === 0) ? 0: round(($scorecard['total_black_people_killed'] / $scorecard['total_black_population']) * 100, 2) }},
            latinx: {{ (!isset($scorecard['total_hispanic_population']) || $scorecard['total_hispanic_population'] === 0) ? 0: round(($scorecard['total_hispanic_people_killed'] / $scorecard['total_hispanic_population']) * 100, 2) }},
            white: {{ (!isset($scorecard['total_white_population']) || $scorecard['total_white_population'] === 0) ? 0: round(($scorecard['total_white_people_killed'] / $scorecard['total_white_population']) * 100, 2) }}
        };
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

    <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox.js/plugins/geo-viewport/v0.1.1/geo-viewport.js"></script>

    <script src="{{ mix('/js/home.js') }}"></script>
@endsection

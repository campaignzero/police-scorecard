@extends('layouts.app')

@section('title', $title)
@section('description', $description)

@section('content')
    <x-partial.menu />

    <x-partial.hero :type="$type" :total="$total" />

    <x-partial.killings-by-police :type="$type" :scorecard="$scorecard" />

    <x-partial.grades :type="$type" :grades="$grades" />

    <x-partial.about :type="$type" />

    <x-partial.whats-next />

    <x-partial.footer :state="$state" :states="$states" />
@endsection

@section('modal')
    <x-partial.modal :state="$state" :type="$type" :states="$states" />
@endsection

@section('scripts')
    <x-script.home :states="$states" :type="$type" :scorecard="$scorecard" />
@endsection

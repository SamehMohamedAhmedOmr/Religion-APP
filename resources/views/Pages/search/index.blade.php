@extends('Pages.layouts.app-home')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/selectize.bootstrap3.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Markazi+Text&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
@endsection

@section('pageTitle')
    {{ __('home.app_name') }}
@endsection

@section('content')

    <div class="container">
        <div class="row pt-4">

            <div class="col-lg-8 col-12">
                @include('Pages.search.result')
            </div>

            <div class="col-lg-4 col-12">
                @include('Pages.search.search-left-side')
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/selectize.min.js') }}"></script>
    <script type="text/javascript"
            data-tooltip ="{{ __('home.fill_input') }}" id='tooltip-script'
        >

        let tooltip = $('#tooltip-script').data('tooltip');

        $('.specialSelect').selectize();

        $('.keywords').selectize({
            maxItems: null
        });
        $('input').tooltip({'trigger':'focus', 'title': tooltip });

    </script>



@endsection

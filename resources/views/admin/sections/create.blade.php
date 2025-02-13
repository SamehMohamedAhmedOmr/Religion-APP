@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/tables.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/selectize.bootstrap3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/specialFileInput.css') }}" />
@endsection

@section('pageTitle')
{{ __('admin.sections') }} | {{ __('admin.add') }}
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-header top-card">{{ __('admin.Add new Section') }}</div>
                    <div class="card-body">
                        <div class="p-3">
                            <a class='back-button' href="{{ url('sections') }}" title="Back">
                                <button class="btn btn-warning btn-sm">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __('home.Back') }}
                                </button>
                            </a>
                        </div>

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ url('sections') }}" accept-charset="UTF-8" class="form-horizontal custom-form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.sections.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/selectize.min.js') }}"></script>
    <script type="text/javascript">
        $('.specialSelect').selectize();
    </script>
    <script src="{{ URL::asset('js/ajax/getLists4.js') }}"></script>
@endsection

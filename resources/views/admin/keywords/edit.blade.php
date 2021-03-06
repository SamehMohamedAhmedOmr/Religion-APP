@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/tables.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/specialFileInput.css') }}"/>
@endsection

@section('pageTitle')
    {{ __('admin.keywords') }} | {{ __('admin.edit') }}
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-header top-card">{{ __('admin.edit') }}
                            <span class="name">{{ $keyword->name }}</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <a class='back-button' href="{{ url('keywords') }}" title="Back">
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

                            <form method="POST" action="{{ url('keywords/' . $keyword->id) }}" accept-charset="UTF-8"
                                  class="form-horizontal custom-form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                @include ('admin.keywords.form', ['formMode' => 'edit'])

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

@section('scripts')

    </div>
@endsection

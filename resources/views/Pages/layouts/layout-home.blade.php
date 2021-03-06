<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('pageTitle')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('library/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('library/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ URL::asset('library/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ URL::asset('images/fatwa_logo.webp') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    @if (App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/specialRTL.css') }}">
    @endif

    @yield('styles')

    <style>
        .whole-page-overlay{
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            position: fixed;
            background: rgb(226, 227, 228 ,0.8);
            width: 100%;
            height: 100% !important;
            z-index: 1050;
        }
        .whole-page-overlay div{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: inherit;
        }
        .whole-page-overlay .center-loader{
            color: white;
            margin: 20px;
        }

        @media (min-width: 1300px){
            .container {
                max-width: 1300px;
            }
        }

    </style>
</head>

<body>
    <div class="container-scroller">
        @include('Pages.layouts.navbar-home')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            {{--start content--}}
            @yield('content')
            {{--end content--}}

        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <div class="whole-page-overlay" id="whole_page_loader">
        <div>
            <h2 style="" class="app-loader loader-title">
                <img src="{{ URL::asset('images/fatwa_logo.webp') }}"
                     height="100px;" alt="logo"/>
            </h2>
            <img class="center-loader"  style="height:200px;" src="{{ URL::asset('images/loader.gif') }}"/>
        </div>
    </div>
    <!-- container-scroller -->

    <div class="footer-home text-center p-3">

        <p class="text-white font-weight-medium text-center flex-grow align-self-end m-0">
            {{ __('login.Copyright') }} &copy;
            <script>document.write(new Date().getFullYear())</script>
            {{ __('login.All rights reserved.') }}
        </p>

    </div>

    @include('layouts.scripts')

    <script id='input-errors' data-errorMSG="{{ __('placeholder.Please Fill out This Field') }}">
        $(function(){

            setTimeout(function(){
                $('.whole-page-overlay').slideUp();
            }, 500);

            $(document).click(function(){
                $('.search-area').removeClass('d-block').addClass('d-none');
                $('.search-area ul').empty();
            });

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });

        var errorMsg = document.getElementById('input-errors').getAttribute("data-errorMSG");
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity(errorMsg);
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        });




    </script>
</body>

</html>


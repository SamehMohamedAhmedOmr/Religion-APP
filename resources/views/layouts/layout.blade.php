<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{ __('home.app_name') }} |
        @yield('pageTitle')
    </title>
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
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('layouts.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('layouts.side-menu')

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

    @include('layouts.scripts')

    <script id='input-errors'
            data-tooltip ="{{ __('home.fill_input') }}"
            data-errorMSG="{{ __('placeholder.Please Fill out This Field') }}"
    >
        $(function(){

            let tooltip = $('#input-errors').data('tooltip');

            $('input').tooltip({'trigger':'focus', 'title': tooltip });


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

            $('#searchy').on('keyup', function(){
                $value = $(this).val();
                $('.search-area').removeClass('d-none').addClass('d-block');
                var ul = $('.search-area ul');

                if($value != "" | $value != " "){
                    $.ajax({
                    type : 'get',
                    url : '/search',
                    data:{'text':$value},
                    success: function(data){
                        ul.empty();

                        if(data == 0){
                            var li = document.createElement('li');
                            var des = document.createElement('p');
                            des.innerHTML='{{ __("home.No subject") }}';
                            li.append(des);
                            ul.append(li);
                        }
                        else{
                            data.forEach(element => {
                                var li = document.createElement('li');
                                var a = document.createElement('a');
                                var des = document.createElement('p');
                                var h6 = document.createElement('h6');
                                h6.textContent = element.council_definition.council_name;
                                a.append(h6);

                                des.innerHTML=element.subject_description;
                                a.setAttribute('href',element.url);
                                a.append(des);
                                li.append(a);
                                ul.append(li);
                            });
                        }
                    }
                });
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


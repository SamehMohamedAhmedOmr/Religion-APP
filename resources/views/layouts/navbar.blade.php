<!-- partial:partials/_navbar.html -->
<style>
    .notification {
        position: absolute;
        top: 0px;
        right: -10px;
        padding: 3px 3px;
        border-radius: 50%;
        background-color: red;
        color: white;
        height: 20px;
        width: 20px;
        line-height: 17px;
    }

    .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-name {
        position: relative !important;
        top: 2px !important;
    }

    .account-icons {
        font-size: 1.2rem;
        position: relative;
        top: 1px;
    }

    .search-area {
        max-height: 480px;
        background: #fff;
        right: 0;
        left: 0;
        padding: 10px;
        box-shadow: 0px 3px 21px 0px rgba(0, 0, 0, 0.2);
    }

    .search-area li {
        padding: 10px 10px 0px 10px;
        color: #000;
    }

    .search-area li a {
        text-decoration: none;
        color: #000;
    }

    .search-area li:hover {
        background-color: #f9f8f8;
        cursor: pointer;
    }

    @media (max-width: 991px) {
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown {
            right: 20px !important;
        }
    }

</style>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="position:fixed !important;">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="{{ url('dashboard') }}"
               style="transform: scale(1.5); width: 40% !important;">
                <img src="{{ URL::asset('images/logo.png') }}"
                     style="width: auto !important;" alt="logo"  />
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('dashboard') }}">
                <img src="{{ URL::asset('images/logo.png') }}" alt="logo"/>
            </a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-block w-100 position-relative app-title" id="sea">
                <a href="{{ url('dashboard') }}">
                    <img src="{{ URL::asset('images/fatwa_logo.webp') }}"
                         height="30px;" alt="logo"/>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav navbar-nav-right">


            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{ URL::asset('storage/user_pic/default/default_default.png') }}" alt="profile">

{{--                    @if (Auth::user()->image == 'default_default.png')--}}
{{--                        <img src="{{ URL::asset('storage/user_pic/default/'.Auth::user()->image) }}" alt="profile">--}}
{{--                    @else--}}
{{--                        <img src="{{ URL::asset('storage/user_pic/'.Auth::user()->id.'/'.Auth::user()->image) }}"--}}
{{--                             alt="profile">--}}
{{--                    @endif--}}
                    <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalRelatedContent">
                        <i class="mdi mdi-account-circle text-primary account-icons"></i>
                        {{ __('home.profile') }}
                    </a>

                    <a class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout text-primary account-icons"></i>
                        {{ __('home.Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>

    </div>
</nav>
<!-- Button trigger modal-->


<!-- profile Modal -->
<div class="modal fade" id="modalRelatedContent" tabindex="-1" role="dialog" aria-labelledby="profile"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center justify-content-center">
                <h4 class="modal-title" id="myModalLabel">{{__("home.profile")}}</h4>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center flex-column align-items-center">
                    <img src="{{ URL::asset('storage/user_pic/default/default_default.png') }}" alt="profile">
                    <br>
                    <h3 class="media-heading">{{$profile->name}}</h3>
                    <span class="mb-2"><strong>{{__("admin.Email")}}: </strong></span>
                    <span class="label label-warning mb-2">{{$profile->email}}</span>

                </div>

                <div class="d-flex justify-content-center">
                    <p><strong>{{__("home.job")}}: </strong>
                        @if($profile->type==0)
                            <span class="label label-warning">{{__("home.Admin")}}</span>
                        @elseif($profile->type==1)
                            <span class="label label-warning">{{__("home.Staff")}}</span>
                        @else
                            <span class="label label-warning">{{__("home.Council Member")}}</span>
                        @endif
                        <br>
                </div>
            </div>
        </div>
    </div>
</div>

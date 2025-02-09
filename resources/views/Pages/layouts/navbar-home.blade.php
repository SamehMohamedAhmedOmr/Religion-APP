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

    .navbar-home{
        width: 100% !important;
        background-color: #2290ba !important;
        height: 70px !important;
        /* #253270 , #5b326c, #2c2c54 , #3d3d3d , #2290ba*/
    }

</style>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="position:fixed !important;">
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end navbar-home">
        <ul class="navbar-nav p-0 w-100">
            <li class="nav-item nav-search d-block w-100 position-relative app-title" id="sea">
                <a href="{{ url('/') }}">
                    <img src="{{ URL::asset('images/fatwa_logo_white.webp') }}"
                         height="50px;" alt="logo"/>
                </a>
            </li>
        </ul>

    </div>
</nav>
<!-- Button trigger modal-->


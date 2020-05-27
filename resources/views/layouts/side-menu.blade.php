   <nav class="sidebar sidebar-offcanvas" id="sidebar">
       <ul class="nav">

           <li class="nav-item">
               <a class="nav-link" href="{{ url('dashboard') }}">
                   <i class="mdi mdi-home menu-icon"></i>
                   <span class="menu-title">{{ __('home.Dashboard') }}</span>
               </a>
           </li>

            @include('layouts.admin-menu')

       </ul>
   </nav>

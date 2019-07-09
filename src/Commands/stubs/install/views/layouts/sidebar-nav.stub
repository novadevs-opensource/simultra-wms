    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu" style="">
                <li class="nav-header">
                    <div class="dropdown profile-element text-right">
                        <a href="{{route('warehouse.warehouse')}}">
                            <img alt="image" class="" src="https://www.simultra-project.eu/wp-content/uploads/2018/07/simultra-logo-1.png" width="150">
                        </a>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                            <span class="text-muted text-xs block" style="color:#fff !important">Warehouse manager <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="{{route('warehouse.warehouse')}}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('partner.index')}}">Contacts</a></li>
                            <li><a class="dropdown-item" href="{{route('messaging.index')}}">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        <img alt="image" class="" src="https://cifpa.aragon.es/wp-content/uploads/2018/06/Simultra-1-250x205.png" width="48">
                    </div>

                    {{-- Sidebar content --}}
                    @yield('sidebar-content')

                </li>
            </ul>
        </div>
    </nav>
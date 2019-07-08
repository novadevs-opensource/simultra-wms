    <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                @if (checkMode( request() ))
                <a href="{{route('quest', 1)}}" class="btn btn-danger pull-left minimalize-styl-2" id="runExam">
                    <i class="fa fa-stop"></i>
                    {{__('Finish exam mode')}}
                </a>
                @else
                <a href="{{route('quest', 2)}}" class="btn btn-primary pull-left minimalize-styl-2" id="runExam">
                    <i class="fa fa-play"></i>
                    {{__('Run exam mode')}}
                </a>
                @endif
            </div>
            
            <ul class="nav navbar-top-links navbar-right">
                <li id="step2-1">
                    <a href="{{route('warehouse.warehouse')}}">
                        {{__('Warehouse')}}
                    </a>
                </li>
                <li id="step1-message">
                    <a href="{{route('messaging.index')}}">
                        <span>{{__('Messaging')}}</span>
                        @if ( unreadEmails() )
                            <span class="label label-warning">
                                {{ unreadEmails() }}
                            </span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{route('setup.setup')}}">
                        {{__('Settings')}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                        
                    
                </li>
            </ul>

        </nav>
    </div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>@yield('page-header')</h2>
            <ol class="breadcrumb">
                @yield('breadcrumbs')
            </ol>
        </div>
        <div class="col-lg-2">
    
        </div>
    </div>
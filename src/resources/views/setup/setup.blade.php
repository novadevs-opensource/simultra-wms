@extends('layouts.app') 

@section('title') 
    {{__('Setup area')}} 
@endsection 

@section('page-header') 
    {{__('Setup area')}} 
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">Home</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('setup.setup')}}">Setup</a>
</li>
@endsection

@section('sidebar-content')
    <li class="{{isActiveRoute('setup')}}">
        <a href="{{route('setup.setup')}}">
            <span class="nav-label">{{__('Setup')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('setup.setup')}}">
                <a href="{{route('setup.setup')}}">
                    {{__('General')}}
                </a>
            </li>
            @if ( checkRole(Auth()->user()->role, 'ADMIN') )
            <li>
                <a href="#">
                    <span class="nav-label">{{__('Users & Groups')}}</span>
                </a>
            </li>
            @endif
        </ul>
    </li>
    @if ( checkRole(Auth()->user()->role, 'ADMIN') )
    <li class="{{isActiveRoute('reports')}}">
        <a href="{{route('report.index')}}">
            {{__('Reports')}}
        </a>
    </li>
    @endif
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="ibox">
                <div class="ibox-title">
                    <h3>
                        <i class="fa fa-language"></i> {{__('Languaje setup')}} 
                    </h3>
                </div>
                <div class="ibox-content">
                    <p>
                        {{__('Select your preferred language')}}
                    </p>
                    @foreach (locales() as $i)
                        <a href="lang/{{$i}}" class="btn btn-{{isActiveLocale( $i, request() )}}">
                            @switch($i)
                                @case('es')
                                    Spanish
                                    @break
                                @case('en')
                                    English
                                    @break
                                @case('fr')
                                    French
                                    @break
                                @case('it')
                                    Italian
                                    @break
                                @case('nl')
                                    Dutch
                                    @break
                                @default
                            @endswitch
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-4">
            @if ( checkRole(Auth()->user()->role, 'ADMIN') )
            <div class="ibox">
                <div class="ibox-title">
                    <h3>
                        <i class="fa fa-refresh"></i> {{__('Restore default data')}} 
                    </h3>
                </div>
                <div class="ibox-content">
                    <p>
                        {{__('Restore database to defaults')}}
                    </p>
                    <a href="" class="btn btn-primary" id="restoreData">
                        Restore
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('custom-js')
    <script>
        document.getElementById('restoreData').addEventListener('click', function(e){
            var retVal = confirm("{{__('Are you sure? This action will erase all your custom data')}}");
            if( retVal == true ) {
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.open( "GET", "{{route('default')}}", true ); // false for synchronous request
                xmlHttp.send();
                return xmlHttp.responseText;
            } else {
                e.preventDefault();
                return false;
            }
        });
    </script>
@endsection
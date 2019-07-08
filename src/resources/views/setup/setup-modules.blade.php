@extends('layouts.app') 

@section('title') 
    {{__('Module setup')}} 
@endsection 

@section('page-header') 
    {{__('Module setup')}} 
@endsection 

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">Home</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('setup.setup')}}">Setup</a>
</li>

<li class="breadcrumb-item active">
    <a href="{{route('setup.modules')}}">Setup</a>
</li>
@endsection

@section('sidebar-content')
    <li class="{{isActiveRoute('home')}}">
        <a href="{{route('home')}}">
            <span class="nav-label">{{__('My dashboard')}}</span>
        </a>
    </li>
    <li class="{{isActiveRoute('setup')}}">
        <a href="{{route('setup.setup')}}">
            <span class="nav-label">{{__('Setup')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('setup.setup')}}"><a href="{{route('setup.setup')}}">{{__('Info')}}</a></li>
            <li class="{{isActiveRouteChild('setup.company.show')}}">
            @if ( isset($bc->id) )
                <a href="{{route('setup.company.show', $bc->id)}}">
                    {{__('Company/Organisation')}}
                </a>
            @else
                <a href="{{route('setup.company.show', 1)}}">
                    {{__('Company/Organisation')}}
                </a>
            @endif
            </li>
            <li class="{{isActiveRouteChild('setup.modules')}}"><a href="{{route('setup.modules')}}">{{__('Modules')}}</a></li>
            <li class="{{isActiveRouteChild('setup.menus')}}"><a href="{{route('setup.menus')}}">{{__('Menus')}}</a></li>
            <li class="{{isActiveRouteChild('setup.display')}}"><a href="{{route('setup.display')}}">{{__('Display')}}</a></li>
            <li><a href="#">{{__('Translation')}}</a></li>
            <li><a href="#">{{__('Widgets')}}</a></li>
            <li><a href="#">{{__('Alerts')}}</a></li>
            <li><a href="#">{{__('Security')}}</a></li>
            <li><a href="#">{{__('Limits and accuracy')}}</a></li>
            <li><a href="#">{{__('PDF')}}</a></li>
            <li><a href="#">{{__('E-mails')}}</a></li>
            <li><a href="#">{{__('SMS')}}</a></li>
            <li><a href="#">{{__('Dictionaries')}}</a></li>
            <li><a href="#">{{__('Other setup')}}</a></li>
        </ul>
    </li>
    <li>
        <a href="#">
            <span class="nav-label">{{__('Admin tools')}}</span>
        </a>
    </li>
    <li>
        <a href="#">
            <span class="nav-label">{{__('Users & Groups')}}</span>
        </a>
    </li>
@endsection

@section('content')
<div class="container">
    <div class="row">
    
        <div class="col-12">
            <p>
                {{__("Dolibarr modules define which functionality is enabled in software. Some modules require permissions you must grant to users, after enabling module. Click on button on/off to enable a module/feature.")}}
            </p>
        </div>
    </div>
    <div class="row">
            <div class="col-12">
                    <div class="ibox ">
                            <div class="ibox-title">
                                <h5> {{__('Available modules')}} </h5>
                            </div>
                            <div class="ibox-content">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{__('Module name')}}</th>
                                        <th>{{__('Description')}}</th>
                                        <th>{{__('Dependencies')}}</th>
                                        <th>{{__('Version')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Setup')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($modules as $i)
                                        <tr>
                                            <td>{{$i->name}}</td>
                                            <td>...</td>
                                            <td>{{$i->depends_of}}</td>
                                            <td>{{$i->version}}</td>
                                            <td>
                                                @php
                                                    $r = new \Novadevs\Simultra\Base\Http\Controllers\ModulesController;
                                                    $r = $r->getModuleStatus($i->id)
                                                @endphp
                                                {{$r}}
                                            </td>
                                            <td>
                                                <form action="{{route('setup.modules.update', $i->id)}}" method="POST" id="{{$i->id}}-module-status-form">
                                                    @method('PUT')
                                                    {{ csrf_field() }}
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" @if ($r == 'Enabled') checked @endif class="onoffswitch-checkbox" id="status-{{$i->id}}" name="status">
                                                        <label class="onoffswitch-label" for="status-{{$i->id}}">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch" id="switcher-{{$i->id}}"></span>
                                                        </label>
                                                    </div>
                                                </form>
                                                <script>
                                                    el = document.getElementById('switcher-{{$i->id}}');
                                                    el.addEventListener("webkitTransitionEnd", run);
                                                    el.addEventListener("transitionend", run);

                                                    function run(e){
                                                        e.preventDefault();
                                                        document.getElementById('status-{{$i->id}}').value = "off";
                                                        document.getElementById('status-{{$i->id}}').removeAttribute('checked');
                                                        document.getElementById('{{$i->id}}-module-status-form').submit();
                                                    }
                                                </script>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
            </div>
    </div>
</div>
@endsection
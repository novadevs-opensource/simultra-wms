@extends('layouts.app') 

@section('title') 
    {{__('Setup area')}} 
@endsection 

@section('page-header') 
    {{__('Setup area')}} 
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('setup.setup')}}">Administration</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('report')}}">Reports</a>
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
            <li>
                <a href="#">
                    <span class="nav-label">{{__('Users & Groups')}}</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="{{isActiveRoute('report')}}">
        <a href="{{route('report')}}">
            {{__('Reports')}}
        </a>
    </li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3>
                        {{$o->u->name}}{{__("'s report data")}}
                    </h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{__('#')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Action')}}</th>
                                <th>{{__('Score')}}</th>
                                <th>{{__('Practice')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach (json_decode($o->data) as $i)
                            <tr>
                                <td>
                                    {{$counter++}}
                                </td>
                                <td>
                                    {{$i->time}}
                                </td>
                                <td>
                                    {{$i->action}}
                                </td>
                                <td>
                                    {{$i->points}}
                                </td>
                                <td>
                                    {{$i->category}}
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
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
{{saveReport('Entrando desde la vista')}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h3>
                        {{__('Report list')}} 
                    </h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    {{__('User')}}
                                </th>
                                <th>
                                    {{__('Date')}}
                                </th>
                                <th>
                                    {{__('Actions')}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($o as $i)
                            <tr>
                                <td>
                                    {{$i->u->name}}
                                </td>
                                <td>
                                    {{$i->created_at}}
                                </td>
                                <td>
                                    <a href="{{route('report.show', $i->id)}}" class="btn btn-xs btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
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
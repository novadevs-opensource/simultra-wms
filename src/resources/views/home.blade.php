@extends('layouts.app') 

@section('title') 
    {{__('Home area')}} 
@endsection 

@section('page-header') 
    {{__('Home area')}} 
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
        </a>
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
    
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> {{__('Informations')}} </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                    	{{__('Username')}}
                                    </th>
                                    <th>
                                    	{{__('Previous connections')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$app->auth->user()->name}}</td>
                                    <td>todo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> ... </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>
                                    {{__('Open items board')}}
                                </th>
                                <th>
                                    {{__('Number')}}
                                </th>
                                <th>
                                    {{__('Late')}}
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>todo</td>
                                    <td>todo</td>
                                    <td>todo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>{{__('Statistics')}} </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="fullscreen-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" style="">
                            <div class="row">
                                <div class="col-5">
                                    <div class="widget navy-bg p-xs text-center">
                                        <div class="m-b-md">
                                            <i class="fa fa-user fa-4x"></i>
                                            <h1 class="m-xs">todo xx</h1>
                                            <h3 class="font-bold no-margins">
                                                Online/Registered
                                            </h3>
                                            <small>{{__('Users')}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
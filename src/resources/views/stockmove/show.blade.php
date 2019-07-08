@extends('layouts.app') 

@section('title') 
    {{__('Show stock move')}} 
@endsection 

@section('page-header') 
    {{__('Show stock move')}} 
@endsection  

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">{{__('Home')}}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('warehouse.warehouse')}}">{{__('Warehouse')}}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('stockmove.index')}}">{{__('Stock moves')}}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('stockmove.show', $o->id)}}">{{__('Show stock move')}}</a>
    </li>
@endsection

@section('sidebar-content')
    <li class="{{isActiveRouteChild('warehouse.warehouse')}}">
        <a href="{{route('warehouse.warehouse')}}">
            <span class="nav-label">{{__('Operations')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('warehouse.warehouse')}}">
                <a href="{{route('warehouse.warehouse')}}">
                    {{__('All operations')}}
                </a>
            </li>
            <li class="{{isActiveRouteChild('transfer.index')}}" id="step2-1-transfer">
                <a href="{{route('transfer.index')}}">
                    {{__('Transfers')}}
                </a>
            </li>
        </ul>
    </li>
    <li class="{{isActiveRoute('whtool.index')}}">
        <a href="{{route('whtool.index')}}">
            <span class="nav-label">{{__('WH Tools management')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('whtoolindex')}}">
                <a href="{{route('whtool.index')}}">
                    {{__('WH Tools')}}
                </a>
            </li>
        </ul>
    </li>
    <li class="{{isActiveRoute('stockmove.index')}}">
        <a href="{{route('stockmove.index')}}">
            <span class="nav-label">{{__('Traceability')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('whtoolindex')}}">
                <a href="{{route('stockmove.index')}}">
                    {{__('Stock moves')}}
                </a>
            </li>
        </ul>
    </li>
    <li class="{{isActiveRoute('product.index')}}">
        <a href="{{route('product.index')}}">
            <span class="nav-label">{{__('Products')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('product.index')}}">
                <a href="{{route('product.index')}}">
                    {{__('Products')}}
                </a>
            </li>
        </ul>
    </li>
    <li class="{{isActiveRouteChild('warehouse.index')}}">
        <a href="{{route('warehouse.index')}}">
            {{__('Warehouses')}}
        </a>
    </li>
    <li class="{{isActiveRouteChild('location.index')}}">
        <a href="{{route('location.index')}}">
            {{__('Locations')}}
        </a>
    </li>
    <li class="{{isActiveRouteChild('partner.index')}}">
        <a href="{{route('partner.index')}}">
            {{__('Partners')}}
        </a>
    </li>
    <li class="{{isActiveRoute('location.index')}}">
        <a href="{{route('warehouse.index')}}">
            <span class="nav-label">{{__('Configuration')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('setup.setup')}}">
                <a href="{{route('setup.setup')}}">
                    {{__('Settings')}}
                </a>
            </li>
        </ul>
    </li>
    <li class="{{isActiveRoute('documentation.index')}}">
        <a href="{{route('documentation')}}">{{__('Documentation')}}</a>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-6">
                            <table class="table">
                                <tr>
                                    <td><b>{{__('Product')}}</b></td>
                                    <td>{{$o->prod->name}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{__('Quantity')}}</b></td>
                                    <td>{{$o->qty}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{__('Description')}}</b></td>
                                    <td>{{$o->description}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="table">
                                <tr>
                                    <td><b>{{__('Picking type')}}</b></td>
                                    <td>{{$o->picking_type}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{__('Priority')}}</b></td>
                                    <td>{{$o->priority}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{__('Expected date')}}</b></td>
                                    <td>{{$o->expected_date}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-6">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h3>{{__('Origin')}}</h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td><b>{{__('Source')}}</b></td>
                                    <td>{{$o->source}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{__('Source location')}}</b></td>
                                    <td>{{$o->source_location}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h3>{{__('Destination')}}</h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td><b>{{__('Destination')}}</b></td>
                                    <td>{{$o->destination}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{__('Destination location')}}</b></td>
                                    <td>{{$o->destination_location}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
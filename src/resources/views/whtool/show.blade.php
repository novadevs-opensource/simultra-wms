@extends('layouts.app') 

@section('title') 
    {{__('WH Tool')}} 
@endsection 

@section('page-header') 
    {{$o->name}}
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">{{__('Home')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.warehouse')}}">{{__('Warehouse')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('whtool.index')}}">{{__('WH Tools management')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('whtool.index')}}">{{$o->name}}</a>
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
    <li class="{{isActiveRoute('whtool.show')}}">
        <a href="{{route('whtool.index')}}">
            <span class="nav-label">{{__('WH Tools management')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('whtool.show')}}">
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
    <div class="col-6">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-12">
                        @if ($o->image != null)
                            <img width="100%" src="{{asset($o->image)}}" alt="">
                        @else
                            @switch($o->identifier) 
                                @case('RE001')
                                    <img width="100%" src="{{asset('vendor/novadevs/simultra/whtools-simultra/forklift.png')}}" alt="">
                                    @break
                                @case('RE002')
                                    <img width="100%" src="{{asset('vendor/novadevs/simultra/whtools-simultra/electricTrolley.png')}}" alt="">
                                    @break
                                @case('RE003')
                                    <img width="100%" src="{{asset('vendor/novadevs/simultra/whtools-simultra/electricTrolley.png')}}" alt="">
                                    @break
                                @case('RE004')
                                    <img width="100%" src="{{asset('vendor/novadevs/simultra/whtools-simultra/handcart.png')}}" alt="">
                                    @break
                                @default
                                    @break
                            @endswitch
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="ibox">
            <div class="ibox-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__('Name of the tool')}}</th>
                            <th>{{__('Identifier')}}</th>
                            <th>{{__('Documentation')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$o->name}}</td>
                            <td>{{$o->identifier}}</td>
                            <td>
                            @switch($o->identifier)
                                @case('RE001')
                                    <a href="{{ asset('vendor/novadevs/simultra/docs/es/forklift_es.pdf') }}" target="_blank" class="btn btn-xs btn-primary">
                                        <i class="fa fa-eye"></i>
                                    @break
                                @case('RE002')
                                    <a href="{{ asset('vendor/novadevs/simultra/docs/es/electricTrolley_es.pdf') }}" target="_blank" class="btn btn-xs btn-primary">
                                        <i class="fa fa-eye"></i>
                                    {{'hola'}}
                                    @break
                                @case('RE003')
                                    <a href="{{ asset('vendor/novadevs/simultra/docs/es/retractableForklift_es.pdf') }}" target="_blank" class="btn btn-xs btn-primary">
                                        <i class="fa fa-eye"></i>
                                    @break
                                @case('RE004')
                                    <a href="{{ asset('vendor/novadevs/simultra/docs/es/handcart_es.pdf') }}" target="_blank" class="btn btn-xs btn-primary">
                                        <i class="fa fa-eye"></i>
                                    @break
                                @default
                                    @break
                            @endswitch
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
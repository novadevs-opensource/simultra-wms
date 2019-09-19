@extends('layouts.app') 

@section('title') 
    {{__('Locations')}} 
@endsection 

@section('page-header') 
    {{__('Locations')}} 
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">{{__('Home')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.warehouse')}}">{{__('Warehouse')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.warehouse')}}">{{__('Configuration')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('location.index')}}">{{__('Locations')}}</a>
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
                        <div class="col-7">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h3>
                                                {{$loc->name}}
                                            </h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <b>{{__('Is a part of')}}</b>
                                        </td>
                                        <td>
                                            <a href="{{route('warehouse.show', $loc->warehouse->id)}}">
                                                {{$loc->warehouse->shortname}}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>{{__('Location type')}}</b>
                                        </td>
                                        <td>
                                            @switch($loc->location_category)
                                                @case(1)
                                                    {{__('Conventional')}}
                                                    @break
                                                @case(2)
                                                    {{__('Cantilever')}}
                                                    @break
                                                @case(3)
                                                    {{__('Gravity')}}
                                                @default
                                                    @break
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>{{__('Location barcode')}}</b>
                                        </td>
                                        <td>
                                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($loc->location_barcode, 'QRCODE')}}" alt="barcode" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>{{__('Localization scheme')}}</b>
                                        </td>
                                        <td>
                                            <span class="badge">X {{$loc->localization_x}}</span>
                                            <span class="badge badge-success">Y {{$loc->localization_y}}</span> 
                                            <span class="badge badge-warning">Z {{$loc->localization_z}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>{{__('Additional information')}}</b>
                                        </td>
                                        <td>
                                            {{$loc->additional_information}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h3>{{__('Products on this location')}}</h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Quantity')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($loc->products) == 0)
                                        <tr>
                                            <td>
                                                <i>This location is empty</i>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($loc->products as $i)
                                            <tr>
                                                <td>
                                                    <a href="{{route('product.show', $i->id)}}">{{$i->name}}</a>
                                                </td>
                                                <td>
                                                    {{$i->pivot->qty}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h3>
                                                {{__('Locations inside of')}} {{$loc->name}}
                                            </h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{__('Location name')}}
                                        </th>
                                        <th>
                                            {{__('Location type')}}
                                        </th>
                                        <th>
                                            {{__('Location barcode')}}
                                        </th>
                                        <th>
                                            {{__('Localization scheme')}}
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{$loc->name}}
                                        </td>
                                        <td>
                                            {{$loc->location_type}}
                                        </td>
                                        <td>
                                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($loc->location_barcode, 'QRCODE')}}" alt="barcode" />
                                        </td>
                                        <td>
                                            <span class="badge">X {{$loc->localization_x}}</span>
                                            <span class="badge badge-success">Y {{$loc->localization_y}}</span> 
                                            <span class="badge badge-warning">Z {{$loc->localization_z}}</span>
                                        </td>
                                        <td>
                                            @if ( $loc->parentLocation() )
                                                <a href="{{route('location.show', $loc->parentLocation()->id )}}" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @else
                                                --
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
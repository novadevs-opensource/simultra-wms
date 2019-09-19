@extends('layouts.app') 

@section('title') 
    {{__('Warehouses')}} 
@endsection 

@section('page-header') 
    {{__('Warehouse')}} 
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">{{__('Home')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.warehouse')}}">{{__('Warehouse')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.index')}}">{{__('Configuration')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.index')}}">{{__('Warehouses')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('warehouse.create')}}">{{__('Warehouse')}}</a>
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
    <li class="{{isActiveRouteChild('warehouse.show')}}">
        <a href="{{route('warehouse.show', $o->id)}}">
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <h3>
                                        {{$o->name}}
                                    </h3>
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>{{__('Short name')}}</b></td>
                                <td>{{$o->short_name}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>
                                        {{__('Address')}}
                                    </b>
                                </td>
                                <td>{{$o->address}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>
                                        {{__('Partner')}}
                                    </b>
                                </td>
                                <td>
                                    @if ($o->partner != null)
                                        <a href="{{ route('partner.show', $o->partner->id) }}">
                                            {{$o->partner->name}}
                                        </a>
                                    @else
                                        <i>{{__('There is no partner associated to this warehouse')}}</i>
                                    @endif
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Products on this warehouse --}}
            <div class="row">
                <div class="col-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h3>
                                                {{__('Products')}}
                                            </h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{__('Product name')}}
                                        </th>
                                        <th>
                                            {{__('Stock')}}
                                        </th>
                                        <th>
                                            {{__('Internal reference')}}
                                        </th>
                                        <th>
                                            {{__('Location')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($o->getProductsByWarehouse() as $i)
                                    <tr>
                                        <td>
                                            <a href="{{ route('product.show', $i->id) }}">{{$i->name}}</a>
                                        </td>
                                        <td>
                                           {{$i->qty_on_hand}} 
                                        </td>
                                        <td>
                                            {{$i->internal_reference}}
                                        </td>
                                        <td>
                                            <a href="{{route('location.show', $i->locations[0]->id)}}">{{$i->locations[0]->name}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h3>{{__('Map')}}</h3>
                        </div>
                        <div class="ibox-content">
                            @switch($o->id)
                                @case(1)
                                    <img width="90%" src="{{asset('vendor/novadevs/simultra/whtools-simultra/wh1.png')}}" alt="">
                                    @break
                                @case(2)
                                    <img width="90%" src="{{asset('vendor/novadevs/simultra/whtools-simultra/wh2.png')}}" alt="">
                                    @break
                                @case(3)
                                    <img width="90%" src="{{asset('vendor/novadevs/simultra/whtools-simultra/wh2.png')}}" alt="">
                                    @break
                                @default
                                    <i>{{__('Warehouse map not available')}}</i>
                            @endswitch
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
                                <th>
                                    <h3>
                                        {{__('Locations')}}
                                    </h3>
                                </th>
                            </tr>
                            </tr>
                                <th>{{__('Location name')}}</th>
                                <th>{{__('Location barcode')}}</th>
                                <th>{{__('Location address')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($o->locations != null && count($o->locations) > 0)
                                @foreach ($o->locations as $i)
                                <tr>
                                    <td>{{$i->name}}</td>
                                    <td>{{$i->location_barcode}}</td>
                                    <td>
                                        <span class="badge">{{__('corridor')}} {{$i->localization_x}}</span>
                                        <span class="badge badge-success">{{__('shelf')}} {{$i->localization_y}}</span> 
                                        <span class="badge badge-warning">{{__('height')}} {{$i->localization_z}}</span>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">
                                        <i>{{__('There is no locations associated to this warehouse')}}</i>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
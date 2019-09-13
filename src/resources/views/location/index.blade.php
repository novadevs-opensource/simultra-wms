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
    <li class="{{isActiveRoute('setup.setup')}}">
        <a href="{{route('setup.setup')}}">
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
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="ibox">
                <div class="ibox-content">
                    <a href="{{route('location.create')}}" class="btn btn-primary">
                        {{__('Create')}}
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="ibox">
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{__('Location name')}}</th>
                                <th>{{__('Location barcode')}}</th>
                                <th>{{__('Location address')}}</th>
                                <th>{{__('Warehouse')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loc->sortBy('location_barcode') as $i)
                                <tr>
                                    <td>
                                        {{$i->name}}
                                    </td>
                                    <td>{{$i->location_barcode}}</td>
                                    <td>
                                        <span class="badge">{{__('corridor')}} {{$i->localization_x}}</span>
                                        <span class="badge badge-success">{{__('shelf')}} {{$i->localization_y}}</span> 
                                        <span class="badge badge-warning">{{__('height')}} {{$i->localization_z}}</span>
                                    </td>
                                    <td>
                                        <a href="{{route('warehouse.show', $i->warehouse->id)}}">
                                            {{$i->warehouse->shortname}}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($i->status == 0)
                                            Empty
                                        @else
                                            Full
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('location.destroy', $i->id)}}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <a href="{{route('location.show', $i->id)}}" class="btn btn-xs btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @if ( checkRole(Auth()->user()->role, 'ADMIN') )
                                            <a href="{{route('location.edit', $i->id)}}" class="btn btn-xs btn-secondary">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button type="submit" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            @endif
                                        </form>
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
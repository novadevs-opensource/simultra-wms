@extends('layouts.app') 

@section('title') 
    {{__('Edit partner')}} 
@endsection 

@section('page-header') 
    {{__('Edit partner')}} 
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
    <a href="{{route('partner.index')}}">{{__('Partners')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('partner.edit', $o->id)}}">{{__('Edit partner')}}</a>
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
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form  role="form" method="POST" action="{{route('partner.update', $o->id)}}">
                        {{ csrf_field() }}
						@method('PUT')

                        <div class="form-group row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="name"><b>{{ __('Partner name') }}</b></label>
                                    <div class="col-8">
                                        <input type="text" name="name" id="name" class="form-control" value="{{$o->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="role"><b>{{ __('Partner role') }}</b></label>
                                    <div class="col-8">
                                        <select name="role" id="role" class="form-control">
                                            @if ($o->role == 'customer')
                                                <option value="customer" selected="selected">
                                                    Customer
                                                </option>
                                                <option value="supplier">
                                                    Supplier
                                                </option>
                                            @else
                                                <option value="customer">
                                                    Customer
                                                </option>
                                                <option value="supplier" selected="selected">
                                                    Supplier
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="address"><b>{{ __('Partner address') }}</b></label>
                                    <div class="col-8">
                                        <input type="text" name="address" id="address" class="form-control" value="{{$o->address}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="role"><b>{{ __('Partner warehouse') }}</b></label>
                                    <div class="col-8">
                                        <select name="warehouse" id="warehouse" class="form-control">
                                            @foreach ($w as $i)
                                                @if ($o->warehouse == $i->id)
                                                    <option value="{{$i->id}}" selected="selected">{{$i->name}} - {{$i->shortname}}</option>
                                                @else
                                                    <option value="{{$i->id}}">{{$i->name}} - {{$i->shortname}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <div class="col-sm-5 col-sm-offset-2">
                                <a class="btn btn-white" href="{{route('product.index')}}">{{__('Cancel')}}</a>
                                <button class="btn btn-primary" type="submit">{{__('Save changes')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
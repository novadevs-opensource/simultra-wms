@extends('layouts.app') 

@section('title') 
    {{__('New transfer')}} 
@endsection 

@section('page-header') 
    {{__('New transfer')}} 
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">{{__('Home')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.warehouse')}}">{{__('Warehouse')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.index')}}">{{__('All operations')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.index')}}">{{__('Transfers')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('transfer.create')}}">{{__('New transfer')}}</a>
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
                    <form  role="form" method="POST" action="{{route('transfer.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
						<div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="partner"><b>{{ __('Partner') }}</b></label>
                                    <div class="col-9">
                                        <select name="partner" id="partner" class="form-control @error('partner') is-invalid @enderror">
                                            @foreach ($pa as $i)
                                                <option value="{{$i->id}}">{{$i->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('partner')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label" for="reference"><b>{{ __('Transfer reference') }}</b></label>
                                    <div class="col-9">
                                        <input type="text" name="reference" id="reference" class="form-control @error('partner') is-invalid @enderror">
                                        @error('reference')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="scheduled_date"><b>{{ __('Scheduled date') }}</b></label>
                                    <div class="col-8">
                                        <input type="date" name="scheduled_date" id="scheduled_date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class=" col-4 col-form-label"><b>{{ __('Source document') }}</b></div>
                                    <div class="col-8">
                                        <div class="custom-file">
                                            <input id="source_file" type="file" class="custom-file-input" name="source_document">
                                            <label for="source_file" class="custom-file-label">{{ __('Choose file')}}...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
  
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <h3>{{__('Product')}}</h3>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="product" class="col-3 col-form-label">{{__('Product')}}</label>
                                    <div class="col-9">
                                        <select name="product" id="product" class="form-control @error('product') is-invalid @enderror">
                                            @foreach ($p as $i)
                                                <option value="{{$i->id}}">{{$i->internal_reference}}</option>
                                            @endforeach
                                        </select>
                                        @error('product')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="qty" class="col-3 col-form-label">{{__('Quantity')}}</label>
                                    <div class="col-9">
                                        <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror">
                                        @error('qty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <h3>{{__('Locations')}}</h3>
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="source_location" class="col-4 col-form-label">{{__('Source location')}}</label>
                                        <div class="col-8">
                                            <select name="source_location" id="source_location" class="form-control">
                                                @foreach ($l as $i)
                                                    <option value="{{$i->id}}">{{$i->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <label for="destination_location" class="col-4 col-form-label">{{__('Destination location')}}</label>
                                        <div class="col-8">
                                            <select name="destination_location" id="destination_location" class="form-control">
                                                @foreach ($l as $i)
                                                    <option value="{{$i->id}}">{{$i->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <div class="col-sm-5 col-sm-offset-2">
                                <a class="btn btn-white" href="{{route('transfer.index')}}">{{__('Cancel')}}</a>
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
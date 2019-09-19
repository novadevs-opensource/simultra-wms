@extends('layouts.app') 

@section('title') 
    {{__('New product')}} 
@endsection 

@section('page-header') 
    {{__('New product')}} 
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">{{__('Home')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.warehouse')}}">{{__('Warehouse')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('product.index')}}">{{__('Products')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('product.create')}}">{{__('New product')}}</a>
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
                    <form  role="form" method="POST" action="{{route('product.store')}}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            
                            <div class="col-6">

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="name"><b>{{ __('Product name') }}</b></label>
                                    <div class="col-8">
                                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="ean13"><b>{{ __('EAN13 Barcode') }}</b></label>
                                    <div class="col-8">
                                        <input type="text" value="{{ old('ean13') }}" class="form-control @error('ean13') is-invalid @enderror" name="ean13" id="ean13">
                                        @error('ean13')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="internal_reference"><b>{{ __('Internal reference') }}</b></label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('internal_reference') is-invalid @enderror" value="{{ old('internal_reference') }}" name="internal_reference" id="internal_reference">
                                        @error('internal_reference')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="weight_volume"><b>{{ __('Weight volume') }}</b></label>
                                    <div class="col-8">
                                        <input type="number" class="form-control @error('weight_volume') is-invalid @enderror" name="weight_volume" value="{{ old('weight_volume') }}" id="weight_volume" placeholder="0,00">
                                        @error('weight_volume')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="weight_gross_weight"><b>{{ __('Weight gross weight') }}</b></label>
                                    <div class="col-8">
                                        <input type="number" class="form-control @error('weight_gross_weight') is-invalid @enderror" name="weight_gross_weight" value="{{ old('weight_gross_weight') }}" id="weight_gross_weight" placeholder="0,00">
                                        @error('weight_gross_weight')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="weight_net_weight"><b>{{ __('Weight volume') }}</b></label>
                                    <div class="col-8">
                                        <input type="number" class="form-control @error('weight_net_weight') is-invalid @enderror" name="weight_net_weight" value="{{ old('weight_net_weight') }}" id="weight_net_weight" placeholder="0,00">
                                        @error('weight_net_weight')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
							<div class="col-2">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" class="form-control" value="{{ old('for_sale') }}" name="for_sale" id="for_sale" placeholder="0" checked=>
                                    <label for="for_sale">
                                            <b>{{ __('For sale') }}</b>
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" class="form-control" name="active" value="{{ old('active') }}" id="active" placeholder="0" checked="">
                                    <label for="active">
                                            <b>{{ __('Is active?') }}</b>
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" class="form-control" name="perishable" value="{{ old('perishable') }}" id="perishable" placeholder="0">
                                    <label for="perishable">
                                            <b>{{ __('Is perishable?') }}</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                          
                        <div class="form-group row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="product_type"><b>{{ __('Product type') }}</b></label>
                                    <div class="col-8">
                                        <select name="location_type" id="product_type" class="form-control" disabled>
                                            <option value="1">
                                                Stockable Product
                                            </option>
                                        
                                            <option value="2">
                                                Consumable
                                            </option>
                                        
                                            <option value="3">
                                                Service
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="price"><b>{{ __('Sale price') }}</b></label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" id="price" placeholder="0,00">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="qty_forecasted"><b>{{ __('Forecasted quantity') }}</b></label>
                                    <div class="col-8">
                                        <input type="number" class="form-control  @error('qty_forecasted') is-invalid @enderror" value="{{ old('qty_forecasted') }}" name="qty_forecasted" id="qty_forecasted">
                                        @error('qty_forecasted')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="date_of_expiry" class="col-4 col-form-label"><b>{{__('Expiry date')}}</b></label>
                                    <div class="col-8">
                                        <input type="date" name="date_of_expiry" id="date_of_expiry" value="{{ old('date_of_expiry') }}" class="form-control @error('date_of_expiry') is-invalid @enderror">
                                        @error('date_of_expiry')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label  class="col-form-label" for="additional_information"><b>{{__('Additional information')}}</b></label>
                                <textarea disabled name="additional_information" id="additional_information" cols="30" rows="10" class="form-control"></textarea>
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
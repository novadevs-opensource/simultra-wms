@extends('layouts.app') 

@section('title') 
    {{__('New location')}} 
@endsection 

@section('page-header') 
    {{__('New location')}} 
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">{{__('Home')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.warehouse')}}">{{__('Warehouse')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('warehouse.warehouse')}}">{{__('Configuration')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('location.index')}}">{{__('Locations')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('location.create')}}">{{__('New location')}}</a>
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
                    <form  role="form" method="POST" action="{{route('location.store')}}">
                        {{ csrf_field() }}
						<div class="form-group row">
							<label class="col-sm-2 col-form-label" for="name"><b>{{ __('Location name') }}</b></label>
							<div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
                        </div>

                        <div class="form-group row">
							<label class="col-sm-2 col-form-label" for="parent_location"><b>{{ __('Parent location') }}</b></label>
							<div class="col-sm-10">
                                <select class="form-control" name="parent_location" id="parent_location">
                                    @foreach ($o as $i)
                                        <option value="{{$i->id}}">{{$i->name}}</option>
                                    @endforeach
                                </select>
							</div>
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <h3 class="col-12">{{__('Additional Information')}}</h3>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="location_type"><b>{{ __('Location type') }}</b></label>
                                    <div class="col-8">
                                        <select name="location_type" id="location_type" class="form-control">
                                            <option value="1">
                                                Supplier Location
                                            </option>
                                            <option value="2">
                                                Internal Location
                                            </option>

                                            <option value="3">
                                                Customer Location
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-4 col-form-label" for="active"><b>{{ __('Is active?') }}</b></label>
                                    <div class="i-checks">
                                        <label class=""> 
                                            <div class="icheckbox_square-green checked" style="position: relative;">
                                                <input type="checkbox" value="" checked="" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> 
                                            <i></i> Option two checked
                                        </label>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label class="col-12 col-form-label" for="active"><b>{{ __('Is active?') }}</b>
                                        <input type="checkbox" name="active" id="active" checked="" class="">                                        
                                    </label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row">
                                    <h3 class="col-12">{{__('Localization')}}</h3>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="localization_x"><b>{{ __('Corridor (X)') }}</b></label>
                                    <div class="col-8">
                                        <input type="number" class="form-control  @error('localization_x') is-invalid @enderror" name="localization_x" id="localization_x" placeholder="0">
                                        @error('localization_x')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="localization_y"><b>{{ __('Shelves (Y)') }}</b></label>
                                    <div class="col-8">
                                        <input type="number" class="form-control @error('localization_y') is-invalid @enderror" name="localization_y" id="localization_y" placeholder="0">
                                        @error('localization_y')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="localization_z"><b>{{ __('Height (Z)') }}</b></label>
                                    <div class="col-8">
                                        <input type="number" class="form-control @error('localization_z') is-invalid @enderror" name="localization_z" id="localization_z" placeholder="0">
                                        @error('localization_z')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="location_barcode"><b>{{ __('Location barcode') }}</b></label>
                                    <div class="col-8">
                                        <input type="text" class="form-control @error('location_barcode') is-invalid @enderror" name="location_barcode" id="location_barcode">
                                        @error('location_barcode')
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
                                <textarea name="additional_information" id="additional_information" cols="30" rows="10" class="form-control @error('additional_information') is-invalid @enderror"></textarea>
                                @error('additional_information')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <div class="col-sm-5 col-sm-offset-2">
                                <a class="btn btn-white" href="{{route('location.index')}}">{{__('Cancel')}}</a>
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

@section('custom-js')
    <script>
        // $(document).ready(function () {
        //     $('.i-checks').iCheck({
        //         checkboxClass: 'icheckbox_square-green',
        //         radioClass: 'iradio_square-green',
        //     });
        // });
    </script>
@endsection
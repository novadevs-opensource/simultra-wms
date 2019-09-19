@extends('layouts.app') 

@section('title') 
    {{__('Edit WH tool')}} 
@endsection 

@section('page-header') 
    {{__('Edit WH tool')}} 
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
    <a href="{{route('whtool.edit', $o->id)}}">{{__('Edit WH tool')}}</a>
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
    <li class="{{isActiveRoute('whtool.edit')}}">
        <a href="{{route('whtool.index')}}">
            <span class="nav-label">{{__('WH Tools management')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('whtool.edit')}}">
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
        @if (! checkMode( request() ))
            <div class="row">
                <div class="col-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <p>
                                {{__('You are running the <b>demo mode</b>')}}
                            </p>
                            <p>
                                Need help? please, click on "Help me!" button.
                            </p>
                            <div class=" m-t-sm">
                                <a href="#" class="btn btn-primary startTour"><i class="fa fa-play"></i> {{__('Help me!')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    <div class="row">
        <div class="col-12">
            <div class="ibox">
                <div class="ibox-content">
                    <form  role="form" method="POST" action="{{route('whtool.update', $o->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="name"><b>{{ __('WH Tool') }}</b></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$o->name}}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
        
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="user_id"><b>{{ __('User') }}</b></label>
                                    <div class="col-sm-10"> 
                                        <select  class="form-control" name="user_id" id="user">
                                            <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group row" id="step4-2">
                                    <label class="col-12 col-form-label" for="in_use"><b>{{ __('Is in use?') }}</b>
                                        @if ($o->in_use)
                                        <input type="checkbox" name="in_use" id="in_use" checked="checked">
                                        @else
                                        <input type="checkbox" name="in_use" id="in_use">
                                        @endif
                                    </label>
                                </div>
        
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="identifier"><b>{{ __('Identifier') }}</b></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="identifier" id="identifier" class="form-control @error('identifier') is-invalid @enderror"  value="{{$o->identifier}}">
                                        @error('identifier')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
							<div class=" col-2 col-form-label">{{ __('Image') }}</div>
							<div class="col-1">
                                @if ($o->image != null)
                                    <img src="{{asset($o->image)}}" alt="{{__('Tool image')}}" height="35" class="pull-left">    
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
							<div class="col-3">
								<div class="custom-file">
									<input id="image" type="file" class="custom-file-input" name="image">
                                    <label for="image" class="custom-file-label">{{ __('Choose file')}}...</label>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</div>
						</div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <div class="col-sm-5 col-sm-offset-2">
                                <a class="btn btn-white" href="{{route('whtool.index')}}">{{__('Cancel')}}</a>
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
        $(document).ready(function (){
            var tour = new Tour({
                steps: [{
    
                        element: "#step4-2",
                        title: "Machine selection",
                        content: "Do you need this tool? please, <b>click on the 'is in use' checkbox</b>",
                        placement: "left"
                    }
            ]});
    
    
            $('.startTour').click(function(){
                tour.restart();
            })
    
        });
    </script>
@endsection
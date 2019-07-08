@extends('layouts.app') 

@section('title') 
    {{__('All operations')}} 
@endsection 

@section('page-header') 
    {{__('All operations')}} 
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">{{__('Home')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('warehouse.warehouse')}}">{{__('Warehouse')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('warehouse.warehouse')}}">{{__('All operations')}}</a>
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
        <div class="col-10 offset-1">
            @if (! checkMode( request() ))
            <div class="row">
                <div class="col-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <p>
                                {{__('You are running the demo mode, please, click on the start demo button to start the tour')}}
                            </p>
                            <p>
                                {{__('If you are already running the tour, please, click on resume tour button.')}}
                            </p>
                            <div class=" m-t-sm">
                                <a href="#" class="btn btn-primary startTour"><i class="fa fa-play"></i> Start Tour</a>
                                <a href="#" class="btn btn-primary resumeTour"><i class="fa fa-play"></i> Resume Tour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-4">
                    <a href="{{route('transfer.index')}}" class="text-primary">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <span class="label label-info float-right">{{__('Receipts')}}</span>
                                <h5>{{__('Orders')}}</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$r}}</h1>
                                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                                <div class="stat-percent font-bold text-info"><i class="fa fa-level-up"></i></div>
                                <small>{{__('Units')}}</small>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-4">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <span class="label label-success float-right">{{__('Transfers')}}</span>
                            <h5>{{__('Orders')}}</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">0</h1>
                            {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                            <div class="stat-percent font-bold text-success"><i class="fa fa-bolt"></i></div>
                            <small>{{__('Units')}}</small>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <a href="{{route('transfer.index')}}" class="text-primary">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <span class="label label-danger float-right">{{__('Delivery orders')}}</span>
                                <h5>{{__('Orders')}}</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$d}}</h1>
                                {{-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> --}}
                                <div class="stat-percent font-bold text-danger"><i class="fa fa-level-down"></i></div>                                
                                <small>{{__('Units')}}</small>
                            </div>
                        </div>
                    </a>
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
    
                        element: "#step1-message",
                        title: "Messaging",
                        content: "As a good manager, the first thing which you need to do, is check your mail inbox, please, <b>click on the 'Messaging' link</b>",
                        placement: "top"
                    }
                ]});
    
    
            $('.startTour').click(function(){
                tour.restart();
            })
    
        });
    </script>

    <script>
        $(document).ready(function (){
            var tour2 = new Tour({
                steps: [{
    
                        element: "#step2-1-transfer",
                        title: "Make a transfer",
                        content: "To make a goods transfer, firstly, you'll need to click on <b>'Transfers'. Here, you can check the picking list</b>",
                        placement: "right",
                        // backdrop: true,
                        // backdropContainer: '#wrapper',
                        // onShown: function (tour){
                        //     $('body').addClass('tour-open')
                        // },
                        // onHidden: function (tour){
                        //     $('body').removeClass('tour-close')
                        // }
                    }
                ]});
    
            $('.resumeTour').click(function(){
                // tour2.init();                
                tour2.restart();
            })
    
        });
    </script>
@endsection

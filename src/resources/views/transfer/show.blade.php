@extends('layouts.app') 

@section('title') 
    {{__('Show transfer')}} 
@endsection 

@section('page-header') 
    {{__('Show transfer')}} 
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
<li class="breadcrumb-item active">
    <a href="{{route('warehouse.index')}}">{{__('Transfers')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('warehouse.index')}}">{{__('Show transfer')}}</a>
</li>
@endsection

@section('sidebar-content')
    <li class="{{isActiveRoute('transfer')}}">
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
            <li class="{{isActiveRoute('transfer')}}" id="step2-1-transfer">
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
                                <a href="#" class="btn btn-primary startTour"><i class="fa fa-play"></i> Help me!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    <div class="row">
        <div class="col-3">
            <div class="ibox">
                <div class="ibox-content">
                    @if ($o->status == 1)
                        <span class="text-info">
                            <i class="fa fa-check"></i> {{__('Validated')}}
                        </span>
                    @else
                        <span class="text-warning">
                            <i class="fa fa-warning"></i> {{__('Pending')}}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="ibox">
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <h3>
                                        {{__('Transfer #')}}{{$o->id}}
                                    </h3>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td><b>{{__('Reference')}}</b></td>
                                    <td>{{$o->reference}}</td>
                                </tr>  
                                @if ($o->destinationLocation->location_type != 1)
                                <tr>
                                    <td><b>{{__('Destination location')}}</b></td>
                                    <td>{{$o->destinationLocation->name}}</td>
                                </tr>
                                @endif                              
                                @if ($o->destinationLocation->location_type == 1)
                                <tr>
                                    <td><b>{{__('Source location')}}</b></td>
                                    <td>{{$o->sourceLocation->name}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td><b>{{__('Creation date')}}</b></td>
                                    <td>{{$o->created_at}}</td>
                                </tr>
                        </tbody>
                    </table>    
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
                                    <h4>{{__('Additional info')}}</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td><b>{{__('Product')}}</b></td>
                                    <td>
                                        <a href="{{route('product.show', $o->products->id)}}">{{$o->products->name}}: {{$o->products->internal_reference}}</a>
                                    </td>
                                </tr> 
                                <tr>
                                    <td><b>{{__('Quantity')}}</b></td>
                                    <td>{{$o->qty}}</td>
                                </tr>                                
                                <tr>
                                    <td><b>{{__('Partner')}}</b></td>
                                    <td>{{$o->owner->name}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>{{__('Scheduled date')}}</b>
                                    </td>
                                    <td>{{$o->scheduled_date}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{__('Source document')}}</b></td>
                                    <td>
                                        @if ( $o->source_document )
                                            <a class="btn btn-xs btn-success" href="{{asset($o->source_document)}}"><i class="fa fa-download"></i></a>
                                        @else
                                            <i>{{__('Without document')}}</i>
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
@endsection

@section('custom-js')
    <script>
        $(document).ready(function (){
            var tour = new Tour({
                steps: [{
    
                        element: "#step3-1",
                        title: "Picking check",
                        content: "On this screen, you'll find all goods transfers, if you need to check someone, please, <b>click on the 'download' button</b>",
                        placement: "top"
                    },
                    {
                        element: "#step4-1",
                        title: "Machine selection",
                        content: "All is O.K. You are going to need a picking tool to move the goods, please, <b>click on the 'WH Tools' button</b>",
                        placement: "bottom"
                    }
            ]});
    
    
            $('.startTour').click(function(){
                tour.restart();
            })
    
        });
    </script>
@endsection

@extends('layouts.app') 

@section('title') 
    {{__('Transfers')}} 
@endsection 

@section('page-header') 
    {{__('Transfers')}} 
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
        <div class="col-12">
            <div class="ibox">
                <div class="ibox-content">
                    <a href="{{route('transfer.create')}}" class="btn btn-primary">
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
                                <th>{{__('Reference')}}</th>
                                <th>{{__('Destination location')}}</th>
                                <th>{{__('Partner')}}</th>
                                {{-- <th>{{__('Creation date')}}</th> --}}
                                <th>{{__('Status')}}</th>
                                <th id="step3-1">{{__('Source document')}}</th>
                                <th>{{__('Actions')}}</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($o as $i)
                                <tr>
                                    <td>{{$i->reference}}</td>
                                    <td>
                                        @if ($i->sourceLocation->location_type == 1)
                                            <span class="label label-info">
                                                Receipt
                                            </span>
                                        @elseif($i->sourceLocation->location_type == 3)
                                            <span class="label label-danger">
                                                Delivery order
                                            </span>
                                        @endif
                                        
                                    </td>
                                    <td>{{$i->owner->name}}</td>
                                    <td class="text-center">
                                        @if ($i->status == 1)
                                            <span class="text-info">
                                                <i class="fa fa-check"></i>
                                            </span>
                                        @else
                                            <span class="text-warning">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <i class="fa fa-exclamation"></i> {{__('Not available') }}                                        
                                        {{-- <a class="btn btn-xs btn-success" href="{{ Storage::url($i->source_document) }}" target="_blank">
                                            <i class="fa fa-download"></i>
                                        </a> --}}
                                    </td>
                                    <td>
                                        <form action="{{route('transfer.destroy', $i->id)}}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            @if ($i->status == 1)
                                                <a href="{{route('transfer.show', $i->id)}}" class="btn btn-xs btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @else
                                                <a href="{{route('transfer.show', $i->id)}}" class="btn btn-xs btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @if ( checkRole(Auth()->user()->role, 'ADMIN') )
                                                <a href="{{route('transfer.edit', $i->id)}}" class="btn btn-xs btn-secondary">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                @endif
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

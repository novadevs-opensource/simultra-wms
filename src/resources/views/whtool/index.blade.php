@extends('layouts.app') 

@section('title') 
    {{__('WH Tools management')}} 
@endsection 

@section('page-header') 
    {{__('WH Tools management')}} 
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
    <a href="{{route('whtool.index')}}">{{__('WH Tools')}}</a>
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
            <li class="{{isActiveRouteChild('whtool.index')}}">
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
                <div class="col-6">
                    <div class="ibox">
                        <div class="ibox-content">
                            <p>
                                {{__('You are running the <b>demo mode</b>')}}
                            </p>
                            <p>
                                Are you already running the tour? please, click on "Resume Tour" button.
                            </p>
                            <div class=" m-t-sm">
                                <a href="#" class="btn btn-primary resumeTour"><i class="fa fa-play"></i>Resume Tour</a>
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
                    <a href="{{route('whtool.create')}}" class="btn btn-primary">
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
                                <th></th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Identifier')}}</th>
                                {{-- <th>{{__('WH Tool')}}</th> --}}
                                <th>{{__('User')}}</th>
                                <th>{{__('Is in use')}}</th>
                                <th id="step4-1">{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($o as $i)
                                @if ($i->in_use == 1)
                                <tr style="color:red;">
                                @else
                                <tr>
                                @endif
                                    <td><img src="https://www.hyster.com/assets/0/72/74/87/137/139/29819197-d8c7-4702-8822-985ea321b095.png?n=2267" alt="forklift" width="50" style="margin: -1em auto;"></td>
                                    <td>{{$i->name}}</td>
                                    <td>{{$i->identifier}}</td>
                                    {{-- <td>{{$i->type}}</td> --}}
                                    <td>@if ($i->in_use){{$i->user->name}}@endif</td>
                                    <td>@if ($i->in_use)
                                        Yes
                                    @else
                                        No
                                    @endif</td>                                  
                                    <td>
                                        <form action="{{route('whtool.destroy', $i->id)}}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <a href="{{route('whtool.show', $i->id)}}" class="btn btn-xs btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{route('whtool.edit', $i->id)}}" class="btn btn-xs btn-secondary">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            @if ( checkRole(Auth()->user()->role, 'ADMIN') )
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

@section('custom-js')
    <script>
        $(document).ready(function (){
            var tour = new Tour({
                steps: [{
    
                        element: "#step4-1",
                        title: "Machine selection",
                        content: "You have to select a wh tool to make goods movements <b>click on the 'edit' button</b>",
                        placement: "left"
                    }
            ]});
    
    
            $('.startTour').click(function(){
                tour.restart();
            })
    
        });
    </script>
    <script>
        $(document).ready(function (){
            var tour = new Tour({
                steps: [{
    
                        element: "#step4-2",
                        title: "Stock movements",
                        content: "Is the moment of stock movements, please <b>click on the 'Traceability > Stock moves' button</b>",
                        placement: "right"
                    }
            ]});
    
    
            $('.resumeTour').click(function(){
                tour.restart();
            })
    
        });
    </script>
@endsection
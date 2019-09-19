@extends('layouts.app') 

@section('title') 
    {{ $o->name }} 
@endsection 

@section('page-header') 
    {{__('Show product')}} 
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
    <a href="{{route('product.show', $o->id)}}">{{__('Show product')}}</a>
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
    <li class="{{isActiveRoute('product.show')}}">
        <a href="{{route('product.index')}}">
            <span class="nav-label">{{__('Products')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('product.show')}}">
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
    <div class="row">
        <div class="col-12">
            <div class="ibox">
                <div class="ibox-content">
                    <button id="print" class="btn btn-success"> {{__('Print product label')}} </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="ibox" id="labelable">
                <div class="ibox-title">
                    <h3>
                        <div class="row">
                            <div class="col-8">
                                {{$o->name}}
                            </div>
                            <div class="col-4">
                                <img height="30px" style="margin-bottom:-10px" src="data:image/png;base64,{{ DNS1D::getBarcodePNG($o->ean13, "EAN13") }}" alt="barcode" />
                            </div>
                        </div>
                    </h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{__('Price')}}</th>
                                <th>{{ __('EAN13 Code') }}</th>
                                <th>{{ __('Internal reference') }}</th>
                                <th>{{__('Date of expiry')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$o->price}} €</td>
                                <td>{{$o->ean13}}</td>
                                <td>{{$o->internal_reference}}</td>
                                <td>
                                    @if ($o->date_of_expiry != null)
                                        {{$o->date_of_expiry}}
                                    @else
                                        {{__('Non perishable')}}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="ibox">
                <div class="ibox-title">
                    <h3>
                        {{__('Product size')}}
                    </h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{__('Weight volume')}}</th>
                                <th>{{ __('Gross weigh') }}</th>
                                <th>{{ __('Net weight') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $o->weight_volume }}</td>
                                <td>{{ $o->weight_gross_weight }}</td>
                                <td>{{ $o->weight_net_weight }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="ibox">
                <div class="ibox-title">
                    <h3>
                        {{__('Inventory data')}}
                    </h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Forecasted') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td
                                @if ($o->qty_on_hand < $o->qty_forecasted)
                                    style="color:red";
                                @endif
                                >{{ $o->qty_on_hand}}</td>
                                <td>{{ $o->qty_forecasted }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="ibox">
                <div class="ibox-title">
                    <h3>
                        {{__('Inventory status')}}
                    </h3>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{__('Location')}}</th>
                                <th>{{ __('Quantity') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($o->locations) == 0)
                                <tr>
                                    <td>
                                        <i>This product is not allocated</i>
                                    </td>
                                </tr>
                            @else
                                @foreach ($o->locations as $i)
                                <tr>
                                    <td>
                                        <a href="{{route('location.show', $i->id)}}">{{$i->name}}</a>
                                    </td>
                                    <td>{{$i->pivot->qty}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
<script>
    document.getElementById('print').addEventListener('click', function(){
        printElem('labelable');
        $.ajax({
            /* the route pointing to the post function */
            url: '/product-label-report' + '/' + {{$o->id}},
            type: 'GET',
            /* send the csrf-token and the input to the controller */
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                console.log('Success... for ' + data);
            }
        });
    });

    function printElem(elem)
    {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');

        mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h3>' + document.title  + '</h3>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>    
@endsection
@extends('layouts.app') 

@section('title') 
    {{__('New stock move')}} 
@endsection 

@section('page-header') 
    {{__('New stock move')}} 
@endsection  

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">{{__('Home')}}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('warehouse.warehouse')}}">{{__('Warehouse')}}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('stockmove.index')}}">{{__('Stock moves')}}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('stockmove.create')}}">{{__('New stock move')}}</a>
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
    <li class="{{isActiveRoute('stockmove.create')}}">
        <a href="{{route('stockmove.index')}}">
            <span class="nav-label">{{__('Traceability')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('stockmove.create')}}">
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
                    <form  role="form" method="POST" action="{{route('stockmove.store')}}">
                        {{ csrf_field() }}
						<div class="row">
                            <div class="col-6">

                                <div class="form-group row">
                                    <label for="product" class="col-4 col-form-label">{{__('Product')}}</label>
                                    <div class="col-8">
                                        <select name="product" id="product" class="form-control @error('product') is-invalid @enderror">
                                            <option></option>
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
                                    <label for="qty" class="col-4 col-form-label">{{__('Quantity')}}</label>
                                    <div class="col-8">
                                        <input type="number" name="qty" id="qty" class="form-control @error('product') is-invalid @enderror">
                                        @error('qty')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-4 col-form-label">{{__('Description')}}</label>
                                    <div class="col-8">
                                        <input type="text" name="description" id="description" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group row">
                                    <label for="picking_type" class="col-4 col-form-label">{{__('Picking type')}}</label>
                                    <div class="col-8">
                                        <select name="picking_type" id="picking_type" class="form-control @error('picking_type') is-invalid @enderror">
                                            <option value=""></option>
                                            <option value="0">Big</option>
                                            <option value="1">Medium</option>
                                            <option value="2">Small</option>                                            
                                        </select>
                                        @error('picking_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="priority" class="col-4 col-form-label">{{__('Priority')}}</label>
                                    <div class="col-8">
                                        <select name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror">
                                            <option>--</option>
                                            <option value="0">
                                                Not urgent
                                            </option>
                                            <option value="1">
                                                Normal
                                            </option>
                                            <option value="2">
                                                Urgent
                                            </option>
                                            <option value="3">
                                                Very Urgent
                                            </option>
                                        </select>
                                        @error('priority')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="expected_date" class="col-4 col-form-label">{{__('Expected date')}}</label>
                                    <div class="col-8">
                                        <input type="date" name="expected_date" id="expected_date" class="form-control @error('expected_date') is-invalid @enderror">
                                        @error('expected_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <h3>{{__('Origin')}}</h3>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <label for="source" class="col-4 col-form-label">{{__('Source')}}</label>
                                        <div class="col-8">
                                            <input type="text" name="source" id="source" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="source_location" class="col-4 col-form-label">{{__('Source location')}}</label>
                                        <div class="col-8">
                                            {{-- <select name="source_location" id="source_location" class="form-control">
                                                <option>--</option>
                                                @foreach ($l as $i)
                                                    <option value="{{$i->id}}">{{$i->name}}</option>
                                                @endforeach
                                            </select> --}}
                                            <input type="text" name="source_location" id="source_location" placeholder="Barcode..." class="form-control typeahead-source @error('source_location') is-invalid @enderror" />
                                            @error('source_location')
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
                                        <h3>{{__('Destination')}}</h3>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <label for="destination" class="col-4 col-form-label">{{__('Destination')}}</label>
                                        <div class="col-8">
                                            <input type="text" name="destination" id="destination" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="destination_location" class="col-4 col-form-label">{{__('Destination location')}}</label>
                                        <div class="col-8">
                                            {{-- <select name="destination_location" id="destination_location" class="form-control">
                                                @foreach ($l as $i)
                                                    <option value="{{$i->id}}">{{$i->name}}</option>
                                                @endforeach
                                            </select> --}}
                                            <input type="text" name="destination_location" id="destination_location" placeholder="Barcode..." class="form-control typeahead-destination" />
                                            @error('destination_location')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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

@section('custom-js')
    <style>
        .twitter-typeahead {
            width: 100%;
        }
            .tt-dataset.tt-dataset-states .tt-suggestion.tt-selectable {
                display: block;
                background: white;
                padding: 0.5em 1em;
                border: 1px solid #f2f2f2;
                width: 100%;
            }
    </style>

    <script src="http://twitter.github.io/typeahead.js/releases/latest/bloodhound.js"></script>
    <script src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.jquery.js"></script>
    <script src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
    <script src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.min.js"></script>
    <script>
        var sources = [
            @foreach($l as $i)
                '{{$i->location_barcode}}',
            @endforeach
        ];

        var destinations = [
            @foreach($l as $i)
                '{{$i->location_barcode}}',
            @endforeach
        ];

        var substringMatcher = function (strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function (i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };

        $('.typeahead-source').typeahead(
            {
                hint: true,
                highlight: true,
                minLength: 1
            }, 
            {
                name: 'sources',
                source: substringMatcher(sources),
                templates: {
                    empty: [
                        '<div class="empty-message alert alert-danger">'
                        + 'Unable to find any <b>Location Code</b> that match the current query',
                        '</div>'
                    ]
                }
            }
        );

        $('.typeahead-destination').typeahead(
            {
                hint: true,
                highlight: true,
                minLength: 1
            }, 
            {
                name: 'destinations',
                source: substringMatcher(destinations),
                templates: {
                    empty: [
                        '<div class="empty-message alert alert-danger">'
                        + 'Unable to find any <b>Location Code</b> that match the current query',
                        '</div>'
                    ]
                }
            }
        );

        $('#product').change(function(){
            $.ajax({
                /* the route pointing to the post function */
                url: '/product-location' + '/' + $(this).val(),
                type: 'GET',
                /* send the csrf-token and the input to the controller */
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data, url) { 
                    // Erasing static locations
                    sources.splice(0, sources.length);

                    // Retrieving available product locations
                    for (let i = 0; i < data.length; i++) {
                        sources.push(data[i].location_barcode);
                        console.log(data[i].location_barcode);
                    }
                }
            });
        });
    </script>
@endsection
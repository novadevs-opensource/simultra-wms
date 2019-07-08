@extends('layouts.app') 

@section('title') 
    {{__('Company/Organisation')}} 
@endsection 

@section('page-header') 
    {{__('Company/Organisation')}} 
@endsection 

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">Home</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('setup.setup')}}">Setup</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('setup.company.show', 1)}}">Company/Organisation</a>
</li>
@endsection

@section('sidebar-content')
    <li class="{{isActiveRoute('home')}}">
        <a href="{{route('home')}}">
            <span class="nav-label">{{__('My dashboard')}}</span>
        </a>
    </li>
    <li class="{{isActiveRoute('setup')}}">
        <a href="{{route('setup.setup')}}">
            <span class="nav-label">{{__('Setup')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('setup.setup')}}"><a href="{{route('setup.setup')}}">{{__('Info')}}</a></li>
            <li class="{{isActiveRouteChild('setup.company.show')}}">
            @if ( isset($bc->id) )
            <li class="{{isActiveRouteChild('setup.company.show')}}">
                <a href="{{route('setup.company.show', $bc->id)}}">
                    {{__('Company/Organisation')}}
                </a>
            @else
            <li class="{{isActiveRouteChild('setup.company.create')}}">
                <a href="{{route('setup.company.create')}}">
                    {{__('Company/Organisation')}}
                </a>
            @endif
            </li>
            <li class="{{isActiveRouteChild('setup.modules')}}"><a href="{{route('setup.modules')}}">{{__('Modules')}}</a></li>
            <li class="{{isActiveRouteChild('setup.menus')}}"><a href="{{route('setup.menus')}}">{{__('Menus')}}</a></li>
            <li class="{{isActiveRouteChild('setup.display')}}"><a href="{{route('setup.display')}}">{{__('Display')}}</a></li>
            <li><a href="#">{{__('Translation')}}</a></li>
            <li><a href="#">{{__('Widgets')}}</a></li>
            <li><a href="#">{{__('Alerts')}}</a></li>
            <li><a href="#">{{__('Security')}}</a></li>
            <li><a href="#">{{__('Limits and accuracy')}}</a></li>
            <li><a href="#">{{__('PDF')}}</a></li>
            <li><a href="#">{{__('E-mails')}}</a></li>
            <li><a href="#">{{__('SMS')}}</a></li>
            <li><a href="#">{{__('Dictionaries')}}</a></li>
            <li><a href="#">{{__('Other setup')}}</a></li>
        </ul>
    </li>
    <li>
        <a href="#">
            <span class="nav-label">{{__('Admin tools')}}</span>
        </a>
    </li>
    <li>
        <a href="#">
            <span class="nav-label">{{__('Users & Groups')}}</span>
        </a>
    </li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <p>
                {{__('Edit on this page all known information of the company or foundation you need to manage (For this, click on "Modify" or "Save" button at bottom of page)')}}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <div class="ibox ">
                        <div class="ibox-content">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="width:40%">{{__('Company/organisation information')}}</th>
                                    <th>{{__('Value')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ __('Name') }}</td>
                                        <td>{{ $bc->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Address') }}</td>
                                        <td>{{ $bc->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Zip') }}</td>
                                        <td>{{ $bc->zipcode }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Town') }}</td>
                                        <td>{{ $bc->town }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Country') }}</td>
                                        <td>{{ $bc->country }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('State/Province') }}</td>
                                        <td>{{ $bc->state_province }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Main currency') }}</td>
                                        <td>{{$bc->main_currency}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Phone') }}</td>
                                        <td>{{$bc->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Fax') }}</td>
                                        <td>{{$bc->fax}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Mail') }}</td>
                                        <td>{{$bc->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Web') }}</td>
                                        <td>{{$bc->web}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Logo') }}</td>
                                        <td><img src="{{asset('/storage/'. $bc->logo)}}" alt="{{__('company logo')}}" height="35"></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Note') }}</td>
                                        <td>{{$bc->note}}</td>
                                    </tr>
                                </tbody>
                            </table>
    
                        </div>
                </div>
        </div>
    </div>

    <div class="row">
            <div class="col-12">
                    <div class="ibox ">
                            <div class="ibox-content">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width:40%">{{__('Company/organisation identities')}}</th>
                                        <th>{{__('Value')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{__('Manager(s) name (CEO, director, president...)	')}}</td>
                                            <td>{{$bc->manager}}</td>                                          
                                        </tr>
                                        <tr>
                                            <td>{{__('Capital')}}</td>
                                            <td>{{$bc->capital}}</td>                                          
                                        </tr>
                                        <tr>
                                            <td>{{__('Legal form')}}</td>
                                            <td>{{$bc->legal_form}}</td>                                          
                                        </tr>
                                        <tr>
                                            <td>{{__('Prof Id 1 (CIF/NIF)')}}</td>
                                            <td>{{$bc->profid1}}</td>                                          
                                        </tr>
                                        <tr>
                                            <td>{{__('Prof Id 2 (Social security number)')}}</td>
                                            <td>{{$bc->profid2}}</td>                                          
                                        </tr>
                                        <tr>
                                            <td>{{__('Prof Id 3 (CNAE)')}}</td>
                                            <td>{{$bc->profid3}}</td>                                          
                                        </tr>
                                        <tr>
                                            <td>{{__('Prof Id 4 (Collegiate number)')}}</td>
                                            <td>{{$bc->profid4}}</td>                                          
                                        </tr>
                                        <tr>
                                            <td>{{__('VAT number')}}</td>
                                            <td>{{$bc->vat}}</td>                                          
                                        </tr>
                                        <tr>
                                            <td>{{__('Object of the company')}}</td>
                                            <td>{{$bc->object}}</td>                                          
                                        </tr>
                                    </tbody>
                                </table>
        
                            </div>
                    </div>
            </div>
    </div>

    <div class="row">
            <div class="col-12">
                    <div class="ibox ">
                            <div class="ibox-content">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width:40%">{{__('Information on the fiscal year')}}</th>
                                        <th>{{__('Value')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{__('Starting month of the fiscal year')}}</td>
                                            <td>{{$bc->fiscalmonthstart}}</td>                                          
                                        </tr>
                                    </tbody>
                                </table>
        
                            </div>
                    </div>
            </div>
    </div>

    <div class="row">
            <div class="col-12">
                    <div class="ibox ">
                            <div class="ibox-content">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width:40%">{{__('VAT Management')}}</th>
                                        <th>{{__('Description')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if ( $bc->vat_in_use == 1)
                                            <td>{{__('VAT is used')}}</td>
                                            <td>
                                                <p>
                                                    By default when creating prospects, invoices, orders etc the VAT rate follows the active standard rule:
                                                </p>
                                                <p>
                                                    If the seller is not subjected to VAT, then VAT defaults to 0. End of rule.
                                                </p>
                                                <p>
                                                    If the (selling country= buying country), then the VAT by default equals the VAT of the product in the selling country. End of rule.
                                                </p>
                                                <p>
                                                    If seller and buyer are both in the European Community and goods are transport products (car, ship, plane), the default VAT is 0 ( The VAT should be paid by the buyer to the customoffice of his country and not to the seller). End of rule.
                                                </p>
                                                <p>
                                                    If seller and buyer are both in the European Community and the buyer is not a company, then the VAT by defaults to the VAT of the product sold. End of rule.
                                                </p>
                                                <p>
                                                    If seller and buyer are both in the European Community and the buyer is a company, then the VAT is 0 by default . End of rule.
                                                </p>
                                                <p>
                                                    In any othe case the proposed default is VAT=0. End of rule.
                                                </p>
                                                <p>
                                                    <i>
                                                        Example: In France, it means companies or organisations having a real fiscal system (Simplified real or normal real). A system in which VAT is declared.
                                                    </i>
                                                </p>
                                            </td> 
                                            @else
                                            <td>{{__('VAT is not used')}}</td>
                                            <td>
                                                <p>
                                                    By default the proposed VAT is 0 which can be used for cases like associations, individuals ou small companies.
                                                </p>
                                                <p>
                                                    <i>
                                                        Example: In France, it means associations that are non VAT declared or companies, organisations or liberal professions that have chosen the micro enterprise fiscal system (VAT in franchise) and paid a franchise VAT without any VAT declaration. This choice will display the reference "Non applicable VAT - art-293B of CGI" on invoices.
                                                    </i>
                                                </p>
                                            </td>  
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
        
                            </div>
                    </div>
            </div>
    </div>
    <div class="row">
            <div class="col-12">
                    <div class="ibox ">
                            <div class="ibox-content">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width:40%">{{__('RE Management')}}</th>
                                        <th>{{__('Description')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @php
                                                $bc->localtax1_in_use = json_decode($bc->localtax1_in_use)
                                            @endphp
                                            @if ($bc->localtax1_in_use->localtax1_in_use == 1)
                                            <td>{{__('RE is used')}}</td>
                                            <td>
                                                <p>
                                                    The RE rate by default when creating prospects, invoices, orders etc follow the active standard rule:
                                                </p>
                                                <p>
                                                    If te buyer is not subjected to RE, RE by default=0. End of rule.
                                                </p>
                                                <p>
                                                    If the buyer is subjected to RE then the RE by default. End of rule.
                                                </p>
                                                <p>
                                                    <i>
                                                        Example: In Spain they are professionals subject to some specific sections of the Spanish IAE.
                                                    </i>
                                                </p>
                                                <p>
                                                    {{__('Reports on local taxes:')}}
                                                    @if ( $bc->localtax1_in_use->localtax1_in_use_val_1 == 0)
                                                        {{__('Sales - Purchases Local Taxes reports are calculated with the difference between localtaxes sales and localtaxes purchases')}}
                                                    @endif
                                                    @if ( $bc->localtax1_in_use->localtax1_in_use_val_1 == 1)
                                                        {{__('Purchases - Local Taxes reports are the total of localtaxes purchases')}}
                                                    @endif
                                                    @if ( $bc->localtax1_in_use->localtax1_in_use_val_1 == 2)
                                                        {{__('Sales - Local Taxes reports are the total of localtaxes sales')}}
                                                    @endif
                                                </p>
                                            </td>
                                            @else
                                                <td>{{__('RE is not used')}}</td>
                                                <td>
                                                    <p>
                                                        By default the proposed RE is 0. End of rule.
                                                    </p>
                                                    <p>
                                                        <i>
                                                            Example: In Spain they are professional and societies and subject to certain sections of the Spanish IAE.
                                                        </i>
                                                    </p>
                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
        
                            </div>
                    </div>
            </div>
    </div>

    <div class="row">
            <div class="col-12">
                    <div class="ibox ">
                            <div class="ibox-content">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width:40%">{{__('IRPF Management')}}</th>
                                        <th>{{__('Description')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @php
                                                $bc->localtax2_in_use = json_decode($bc->localtax2_in_use)
                                            @endphp
                                            @if ($bc->localtax2_in_use->localtax2_in_use == 1)
                                            <td>{{__('IRPF is used')}}</td>
                                            <td>
                                                <p>
                                                    The RE rate by default when creating prospects, invoices, orders etc follow the active standard rule:
                                                </p>
                                                <p>
                                                    If te buyer is not subjected to RE, RE by default=0. End of rule.
                                                </p>
                                                <p>
                                                    If the buyer is subjected to RE then the RE by default. End of rule.
                                                </p>
                                                <p>
                                                    <i>
                                                        Example: In Spain they are professionals subject to some specific sections of the Spanish IAE.
                                                    </i>
                                                </p>
                                                <p>
                                                    {{__('Rate:')}} {{$bc->localtax2_in_use->localtax2_in_use_val_1}}
                                                </p>
                                                <p>
                                                    {{__('Reports on local taxes:')}}
                                                    @if ( $bc->localtax1_in_use->localtax1_in_use_val_1 == 0)
                                                        {{__('Sales - Purchases Local Taxes reports are calculated with the difference between localtaxes sales and localtaxes purchases')}}
                                                    @endif
                                                    @if ( $bc->localtax1_in_use->localtax1_in_use_val_1 == 1)
                                                        {{__('Purchases - Local Taxes reports are the total of localtaxes purchases')}}
                                                    @endif
                                                    @if ( $bc->localtax1_in_use->localtax1_in_use_val_1 == 2)
                                                        {{__('Sales - Local Taxes reports are the total of localtaxes sales')}}
                                                    @endif
                                                </p>
                                            </td>
                                            @else
                                                <td>{{__('IRPF is not used')}}</td>
                                                <td>
                                                    <p>
                                                        {{__('By default the proposed IRPF is 0. End of rule.')}}
                                                    </p>
                                                    <p>
                                                        <i>
                                                            {{__('Example: In Spain they are professional and societies and subject to certain sections of the Spanish IAE.')}}
                                                        </i>
                                                    </p>
                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
            </div>
            <div class="col-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <a href="{{route('setup.company.edit', $bc->id)}}" class="btn btn-primary">
                            {{__('Modify')}}
                        </a>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
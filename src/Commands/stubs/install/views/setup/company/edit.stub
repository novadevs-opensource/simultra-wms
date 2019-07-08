@extends('layouts.app') 

@section('title') 
    {{__('Company/Organisation')}} 
@endsection 

@section('page-header') 
    {{__('Edit')}} {{__('Company/Organisation')}} 
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
        <ul class="nav nav-second-level collapse in" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('setup.setup')}}"><a href="{{route('setup.setup')}}">{{__('Info')}}</a></li>
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
				<div class="ibox-title">
					<div class="row">
						<div class="col-sm-12">
							<h5>{{__('Company/organisation information')}}</h5>
						</div>
					</div>
				</div>
				<div class="ibox-content">
                    <form class="" role="form" method="POST" action="{{ route('setup.company.update', $bc->id) }}" enctype="multipart/form-data">
                        @method('PUT')
						{{ csrf_field() }}
						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="name"><b>{{ __('Name') }}</b></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="name" id="name" value="{{ $bc->name }}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="address">{{ __('Address') }}</label>
							<div class="col-sm-8">
								<textarea name="address" id="address" class="form-control">{{ $bc->address }}</textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="zipcode">{{ __('Zip') }}</label>
							<div class="col-sm-8">
								<input type="number" name="zipcode" id="zipcode" class="form-control" value="{{ $bc->zipcode }}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="town">{{ __('Town') }}</label>
							<div class="col-sm-8">
								<input type="text" name="town" id="town" class="form-control" value="{{ $bc->town }}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="country"><b>{{ __('Country') }}</b></label>
							<div class="col-sm-8">
								<select name="country" id="country" class="form-control">
                                    <option value="Spain">Spain (ES)</option>
                                    {{-- TODO --}}
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="state_province">{{ __('State/Province') }}</label>
							<div class="col-sm-8">
								<select name="state_province" id="state_province" class="form-control">
                                    <option value="Zaragoza">Z - Zaragoza</option>
                                    {{-- TODO --}}
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="main_currency">{{ __('Main currency') }}</label>
							<div class="col-sm-8">
								<select name="main_currency" id="main_currency" class="form-control">
                                    <option value="euro">Euros (€)</option>
                                    {{-- TODO --}}
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="phone">{{ __('Phone') }}</label>
							<div class="col-sm-8">
								<input type="text" name="phone" id="phone" class="form-control" value="{{$bc->phone}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="phone">{{ __('Fax') }}</label>
							<div class="col-sm-8">
								<input type="text" name="fax" id="fax" class="form-control" value="{{$bc->fax}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="email">{{ __('Mail') }}</label>
							<div class="col-sm-8">
								<input type="text" name="email" id="email" class="form-control" value="{{$bc->email}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="phone">{{ __('Web') }}</label>
							<div class="col-sm-8">
								<input type="text" name="web" id="web" class="form-control" value="{{$bc->web}}">
							</div>
						</div>

						<div class="form-group row">
							<div class=" col-4 col-form-label">{{ __('Logo') }}</div>
							<div class="col-1">
								<img src="{{asset('/storage/'. $bc->logo)}}" alt="{{__('company logo')}}" height="35" class="pull-left">
							</div>
							<div class="col-7">
								<div class="custom-file">
									<input id="logo" type="file" class="custom-file-input" name="logo">
									<label for="logo" class="custom-file-label">{{ __('Choose file')}}...</label>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="address">{{ __('Note') }}</label>
							<div class="col-sm-8">
								<textarea name="note" id="notes" class="form-control"{{$bc->note}}></textarea>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="hr-line-dashed"></div>

								<h4>{{__('Company/organisation identities')}}</h4>

								<div class="hr-line-dashed"></div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="manager">{{ __('Manager(s) name (CEO, director, president)') }}...</label>
							<div class="col-sm-8">
								<input type="text" name="manager" id="manager" class="form-control" value="{{$bc->manager}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="capital">{{ __('Capital') }}</label>
							<div class="col-sm-8">
								<input type="text" name="capital" id="capital" class="form-control" value="{{$bc->capital}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="legal_form">{{ __('Legal form') }}</label>
							<div class="col-sm-8">
								<select name="legal_form" id="legal_form" class="form-control">
                                    {{-- TODO --}}
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="profid1">{{ __('Prof Id 1 (CIF/NIF)') }}</label>
							<div class="col-sm-8">
								<input type="text" name="profid1" id="profid1" class="form-control" value="{{$bc->profid1}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="profid2">{{ __('Prof Id 2 (Social security number)') }}</label>
							<div class="col-sm-8">
								<input type="text" name="profid2" id="profid2" class="form-control" value="{{$bc->profid2}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="profid3">{{ __('Prof Id 3 (CNAE)') }}</label>
							<div class="col-sm-8">
								<input type="text" name="profid3" id="profid3" class="form-control" value="{{$bc->profid3}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="profid4">{{ __('Prof Id 4 (Collegiate number)') }}</label>
							<div class="col-sm-8">
								<input type="text" name="profid4" id="profid4" class="form-control" value="{{$bc->profid4}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="vat">{{ __('VAT number') }}</label>
							<div class="col-sm-8">
								<input type="text" name="vat" id="vat" class="form-control" value="{{$bc->vat}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="object">{{ __('Object of the company') }}</label>
							<div class="col-sm-8">
								<textarea name="object" id="object" class="form-control">{{$bc->object}}</textarea>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="hr-line-dashed"></div>

								<h4>{{__('Information on the fiscal year')}}</h4>

								<div class="hr-line-dashed"></div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="fiscalmonthstart">Starting month of the fiscal year</label>
							<div class="col-sm-8">
								<select name="fiscalmonthstart" id="fiscalmonthstart" class="form-control">
                                    {{-- TODO --}}
								</select>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="hr-line-dashed"></div>
								<div class="row">
									<div class="col-4">
										<h4>{{__('VAT Management')}}</h4>
									</div>
									<div class="col-8">
										<h4>{{__('Description')}}</h4>
									</div>
								</div>

								<div class="hr-line-dashed"></div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-4">
								<input type="radio" name="vat_in_use" id="use_vat" @if ( $bc->vat_in_use == 1) checked="checked" @endif>
								<label for="use_vat"> {{__('VAT in use')}}</label>
							</div>
							<div class="col-8">
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
							</div>
						</div>

						<div class="hr-line-dashed"></div>

						<div class="form-group row">
							<div class="col-sm-4">
								<input type="radio" name="vat_in_use" id="no_vat" @if ( $bc->vat_in_use == 0) checked="checked" @endif>
								<label for="no_vat"> {{__('VAT is not used')}}</label>
							</div>
							<div class="col-8">
								<p>
									By default the proposed VAT is 0 which can be used for cases like associations, individuals ou small companies.
								</p>
								<p>
									<i>
										Example: In France, it means associations that are non VAT declared or companies, organisations or liberal professions that have chosen the micro enterprise fiscal system (VAT in franchise) and paid a franchise VAT without any VAT declaration. This choice will display the reference "Non applicable VAT - art-293B of CGI" on invoices.
									</i>
								</p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="hr-line-dashed"></div>
								<div class="row">
									<div class="col-4">
										<h4>{{__('RE Management')}}</h4>
									</div>
									<div class="col-8">
										<h4>{{__('Description')}}</h4>
									</div>
								</div>

								<div class="hr-line-dashed"></div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-4">
                                @php
                                    $bc->localtax1_in_use = json_decode($bc->localtax1_in_use)
                                @endphp
								<input type="radio" name="localtax1_in_use" id="use_lt1" @if ($bc->localtax1_in_use->localtax1_in_use == 1) checked="checked" @endif>
								<label for="use_lt1"> {{__('RE is used')}}</label>
							</div>
							<div class="col-8">
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
								<div class="form-group row">
									<div class="col-12">
										<label for="use_lt1_val_1">
											Reports on local taxes:
										</label>
									</div>
									<div class="col-12">
										<select id="use_lt1_val_1" class="form-control" name="localtax1_in_use_val_1">
											<option value="0" @if ( $bc->localtax1_in_use->localtax1_in_use_val_1 == 0) selected="selected" @endif>Sales - Purchases Local Taxes reports are calculated with the difference between localtaxes sales and localtaxes purchases</option>
											<option value="1" @if ( $bc->localtax1_in_use->localtax1_in_use_val_1 == 1) selected="selected" @endif>Purchases - Local Taxes reports are the total of localtaxes purchases</option>
											<option value="2" @if ( $bc->localtax1_in_use->localtax1_in_use_val_1 == 2) selected="selected" @endif>Sales - Local Taxes reports are the total of localtaxes sales</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="hr-line-dashed"></div>

						<div class="form-group row">
							<div class="col-sm-4">
								<input type="radio" name="localtax1_in_use" id="no_lt1" @if ($bc->localtax1_in_use->localtax1_in_use == 0) checked="checked" @endif>
								<label for="no_lt1"> {{__('RE is not used')}}</label>
							</div>
							<div class="col-8">
								<p>
									By default the proposed RE is 0. End of rule.
								</p>
								<p>
									<i>
										Example: In Spain they are professional and societies and subject to certain sections of the Spanish IAE.
									</i>
								</p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="hr-line-dashed"></div>
								<div class="row">
									<div class="col-4">
										<h4>{{__('IRPF Management')}}</h4>
									</div>
									<div class="col-8">
										<h4>{{__('Description')}}</h4>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
							</div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                @php
                                    $bc->localtax2_in_use = json_decode($bc->localtax2_in_use)
                                @endphp
                                <input type="radio" name="localtax2_in_use" id="use_lt2" @if ($bc->localtax2_in_use->localtax2_in_use == 1) checked="checked" @endif>
                                <label for="use_lt2"> {{__('IRPF is used')}}</label>
                            </div>
                            <div class="col-8">
                                <p>
                                    The RE rate by default when creating prospects, invoices, orders etc follow the active standard rule:
                                </p>
                                <p>
                                    If the seller is not subjected to IRPF, then IRPF by default=0. End of rule.
                                </p>
                                <p>
                                    If the seller is subjected to IRPF then the IRPF by default. End of rule.
                                </p>
                                <p>
                                    <i>
                                        Example: In Spain, freelancers and independent professionals who provide services and companies who have chosen the tax system of modules.
                                    </i>
                                </p>
                                <div class="form-group row">
                                    <div class="col-1">
                                        <label for="localtax2_in_use_val_1" class="col-form-label">
                                            Rate
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <select name="localtax2_in_use_val_1" id="localtax2_in_use_val_1" class="form-control">
                                            <option value="-19" @if ( $bc->localtax2_in_use->localtax2_in_use_val_1 == "-19") selected="selected" @endif>-19</option>
                                            <option value="-15" @if ( $bc->localtax2_in_use->localtax2_in_use_val_1 == "-15") selected="selected" @endif>-15</option>
                                            <option value="-9" @if ( $bc->localtax2_in_use->localtax2_in_use_val_1 == "-9") selected="selected" @endif>-9</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="localtax2_in_use_2">
                                            Reports on local taxes:
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <select id="localtax2_in_use_2" class="form-control" name="localtax2_in_use_val_2">
                                            <option value="0" @if ( $bc->localtax2_in_use->localtax2_in_use_val_2 == 0) selected="selected" @endif>Sales - Purchases Local Taxes reports are calculated with the difference between localtaxes sales and localtaxes purchases</option>
                                            <option value="1" @if ( $bc->localtax2_in_use->localtax2_in_use_val_2 == 1) selected="selected" @endif>Purchases - Local Taxes reports are the total of localtaxes purchases</option>
                                            <option value="2" @if ( $bc->localtax2_in_use->localtax2_in_use_val_2 ==2) selected="selected" @endif>Sales - Local Taxes reports are the total of localtaxes sales</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
							<div class="col-sm-4">
								<input type="radio" name="localtax2_in_use" id="no_lt2">
								<label for="no_lt2"> {{__('IRPF is not used')}}</label>
							</div>
							<div class="col-8">
								<p>
                                    By default the proposed IRPF is 0. End of rule.
								</p>
								<p>
									<i>
                                        Example: In Spain they are bussines not subject to tax system of modules.
									</i>
								</p>
							</div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <div class="col-sm-5 col-sm-offset-2">
                                <a href="{{ route('setup.company.show', $bc->id) }}" class="btn btn-white"> {{__('Cancel') }}</a>
                                <button class="btn btn-primary" type="submit">{{ __('Save changes') }}</button>
                            </div>
                        </div>
					</form>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
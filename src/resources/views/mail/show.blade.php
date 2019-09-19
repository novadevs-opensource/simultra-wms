@extends('layouts.app') 

@section('title') 
    {{__('Messaging - View message')}} 
@endsection 

@section('page-header') 
    {{__('View message')}} 
@endsection  

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">{{__('Home')}}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('messaging.index')}}">{{__('Messaging')}}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{route('messaging.index')}}">{{__('Inbox')}}</a>
	</li>
	<li class="{{isActiveRouteChild('messaging.create')}}">
        <a href="{{route('messaging.sent')}}">
            <span class="nav-label">{{__('Sent')}}</span>
        </a>
    </li>
@endsection

@section('sidebar-content')
    <li class="active">
        <a href="#">
            <span class="nav-label">{{__('Messaging')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('messaging.index')}}">
                <a href="{{route('messaging.index')}}">
                    <span class="nav-label">{{__('Inbox')}}</span>
                </a>
            </li>
            <li class="{{isActiveRouteChild('messaging.create')}}">
                <a href="{{route('messaging.create')}}">
                    <span class="nav-label">{{__('Compose mail')}}</span>
                </a>
            </li>
            <li class="{{isActiveRouteChild('messaging.sent')}}">
                <a href="{{route('messaging.sent')}}">
                    <span class="nav-label">{{__('Sent')}}</span>
                </a>
            </li>
        </ul>
    </li>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-3">
		<div class="ibox ">
			<div class="ibox-content mailbox-content">
				<div class="file-manager">
					<a id="step1-2-compose" class="btn btn-block btn-primary compose-mail" href="{{route('messaging.create', ['action'=>'new'] )}}">Compose Mail</a>
					<div class="space-25"></div>
					<h5>Folders</h5>
					<ul class="folder-list m-b-md" style="padding: 0">
						<li><a href="{{route('messaging.index')}}"> <i class="fa fa-inbox "></i> Inbox
							@if ( unreadEmails() )
								<span class="label label-warning float-right">
									{{ unreadEmails() }}
								</span>
							@endif 
						</a></li>
						<li><a href="{{route('messaging.sent')}}"> <i class="fa fa-envelope-o"></i> Sent Mail</a></li>
						<li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
					</ul>
					<h5>Categories</h5>
					<ul class="category-list" style="padding: 0">
						<li><a href="#"> <i class="fa fa-circle text-navy"></i> Suppliers </a></li>
						<li><a href="#"> <i class="fa fa-circle text-danger"></i> Documents </a></li>
						<li><a href="#"> <i class="fa fa-circle text-warning"></i> Customers </a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-9 animated fadeInRight">
		<div class="mail-box-header">
			<div class="float-right tooltip-demo">
				<a href="{{route('messaging.create', ['action'=>'reply', 'mail' => $o->id ])}}" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-reply"></i> Reply</a>
				{{-- <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Print email"><i class="fa fa-print"></i> </a> --}}
				{{-- <a href="{{route('messaging.index')}}" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </a> --}}
			</div>
			<h2>
				View Message
			</h2>
			<div class="mail-tools tooltip-demo m-t-md">
				<h3>
					<span class="font-normal">Subject: </span>
					{{$o->subject}}
				</h3>
				<h5>
					<span class="float-right font-normal">{{$o->created_at}}</span>
					<span class="font-normal">From: </span>
					{{$o->from}}
				</h5>
			</div>
		</div>
		<div class="mail-box">
			<div class="mail-body">
				{!! $o->body !!}
			</div>
			@if ( $o->attachments )	
			<div class="mail-attachment">
				<p>
					<span>
						<i class="fa fa-paperclip"></i> {{ count( json_decode($o->attachments) ) }} attachments 
					</span>
				</p>
				<div class="attachment">
					@foreach ( json_decode($o->attachments) as $i)
					{{-- [{"name":"delivery_note.pdf", "date":"2019-06-12 01:39:45", "url":"vendor/novadevs/simultra/docs/es/delivery_note_p1_es.pdf"}] --}}
					<div class="file-box">
						<div class="file">
							<a href="{{asset($i->url)}}" target="_blank">
								<span class="corner"></span>

								<div class="icon">
									<i class="fa fa-file"></i>
								</div>
								<div class="file-name">
									{{$i->name}}
									<br>
									<small>Added: {{$i->date}}</small>
								</div>
							</a>
						</div>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
			@endif					
			<div class="mail-body text-right tooltip-demo">
				<a class="btn btn-sm btn-white" href="{{route('messaging.create', ['action'=>'reply', 'mail' => $o->id ])}}"><i class="fa fa-reply"></i> Reply</a>
				<a class="btn btn-sm btn-white" href="{{route('messaging.create', ['action'=>'forward', 'mail' => $o->id ])}}"><i class="fa fa-arrow-right"></i> Forward</a>
				{{-- <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn btn-sm btn-white"><i class="fa fa-print"></i> Print</button> --}}
				{{-- <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm btn-white"><i class="fa fa-trash-o"></i> Remove</button> --}}
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection

@section('custom-js')
    <script>
        $(document).ready(function (){
            var tour = new Tour({
                steps: [{
    
                        element: "#step1-2-compose",
                        title: "Create a message",
                        content: "<b>click on compose mail!!!</b>",
                        placement: "top"
                    }
                ]});
    
            tour.init();
    
            $('.startTour').click(function(){
                tour.restart();
            })
    
        });
    </script>
@endsection
@extends('layouts.app')

@section('title') 
    {{__('Messaging - Inbox')}} 
@endsection 

@section('page-header') 
    {{__('Inbox')}} 
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('home')}}">{{__('Home')}}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('messaging.index')}}">{{__('Messaging')}}</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('messaging.sent')}}">{{__('Sent')}}</a>
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
                        <a class="btn btn-block btn-primary compose-mail" href="{{route('messaging.create')}}">Compose Mail</a>
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
                <h2>
                    Sent messages ({{count($o)}})
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <a href="{{route('messaging.index')}}" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox">
                        <i class="fa fa-refresh"></i> 
                        Refresh
                    </a>
                </div>
            </div>
            <div class="mail-box">
                <table class="table table-hover table-mail">
                    <tbody id="step1-1-read">
                        @foreach ($o as $i)
                        @if ($i->from == Auth::user()->email )
                        <tr class="read">
                            <td class="check-mail">
                                <div class="icheckbox_square-green" style="position: relative;">
                                    <input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                            </td>
                            
                            <td class="mail-contact">
                                <a href="{{route('messaging.show', $i->id)}}">
                                    {{$i->to}}
                                </a>
                            </td>

                            <td class="mail-subject">
                                <a href="{{route('messaging.show', $i->id)}}">
                                    {{$i->subject}}
                                </a>
                            </td>

                            <td>
                                @if ($i->attachments)
                                    <i class="fa fa-paperclip"></i>
                                @endif
                            </td>

                            <td class="text-right mail-date">
                                {{$i->created_at}}
                            </td>
                        </tr>
                        @endif                            
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
@section('custom-js')
    <script>
        $(document).ready(function (){
            var tour = new Tour({
            steps: [
                {
                    element: "#step1-1-read",
                    title: "Read message",
                    content: "As you can see, you have an unread message from a supplier, please, read it <b>clicking on the message subject</b>",
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
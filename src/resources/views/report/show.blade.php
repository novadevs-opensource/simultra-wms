@extends('layouts.app') 

@section('title') 
    {{__('Setup area')}} 
@endsection 

@section('page-header') 
    {{__('Setup area')}} 
@endsection  

@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{route('setup.setup')}}">Administration</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{route('report.index')}}">Reports</a>
</li>
@endsection

@section('sidebar-content')
    <li class="{{isActiveRoute('setup')}}">
        <a href="{{route('setup.setup')}}">
            <span class="nav-label">{{__('Setup')}}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li class="{{isActiveRouteChild('setup.setup')}}">
                <a href="{{route('setup.setup')}}">
                    {{__('General')}}
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="nav-label">{{__('Users & Groups')}}</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="{{isActiveroute('report.index')}}">
        <a href="{{route('report.index')}}">
            {{__('Reports')}}
        </a>
    </li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="ibox">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-9">
                            <h3>
                                {{$o->u->name}}{{__("'s report data")}}
                            </h3>
                        </div>
                        <div class="col-3 pull-right">
                            <a href="{{route('report.edit', $o->id)}}" class="btn btn-warning">{{__('Finish calification')}}</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-6">
                            <h3>
                                {{__('Final score')}} : <span id="points"></span>
                            </h3>
                        </div>
                        <div class="col-6">
                            <h3>
                                {{__('Time elapsed')}} : <span id="time"></span>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{__('#')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Practice')}}</th>                                
                                <th>{{__('Score')}}</th>
                                <th>{{__('Action')}}</th>
                                <th>{{__('Elapsed time')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                                $points = 0;
                            @endphp
                            @foreach (json_decode($o->data) as $i)
                            <tr>
                                <td>
                                    {{$counter++}}
                                </td>
                                <td>
                                    {{$i->time}}
                                </td>
                                <td>
                                    {{$i->action}}
                                </td>
                                <td>
                                    {{$i->points}}
                                </td>
                                <td>
                                    {{$i->description->desc}}
                                </td>
                                <td>
                                    @if (isset($i->date))
                                        {{$i->date}}
                                    @endif
                                </td>
                            </tr>
                            @php
                                $points = $points + (int)$i->points    
                            @endphp
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
    document.getElementById('points').innerText = {{$points}} + '/280';

    String.prototype.toHHMMSS = function () {
        var sec_num = parseInt(this, 10); // don't forget the second param
        var hours   = Math.floor(sec_num / 3600);
        var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
        var seconds = sec_num - (hours * 3600) - (minutes * 60);

        if (hours   < 10) {hours   = "0"+hours;}
        if (minutes < 10) {minutes = "0"+minutes;}
        if (seconds < 10) {seconds = "0"+seconds;}
        return hours+':'+minutes+':'+seconds;
    }

    function getTime() {
        const data = "{{$o->data}}";
        const cleanData = data.replace(/&quot;/g, '"');
        var jsonData = JSON.parse(cleanData);

        var start = new Date(jsonData[0].time);
        var end = new Date(jsonData[ jsonData.length - 1 ].time);
        var total = (end - start) / 1000;

        return total.toString().toHHMMSS()
    }

    document.getElementById('time').innerText = getTime();
</script>    
@endsection
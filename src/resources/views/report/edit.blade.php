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
                    <h3>
                        {{$o->u->name}}{{__("'s report data")}}
                    </h3>
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
                    <form action="{{route('report.update', $o )}}" method="POST" role="form" id="edit-report">
                        @csrf
                        @method('PUT')
                    <table class="table table-bordered table-responsive">
                        <thead class="text-center">
                            <tr>
                                <th>{{__('#')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Practice')}}</th>                                
                                <th>{{__('Score')}}</th>
                                <th class="uppercase">{{__('Data')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 0;
                                $keys = array();
                                $points = 0;
                            @endphp
                            @foreach (json_decode($o->data) as $i)
                            <tr>
                                <td>
                                    {{$counter}}
                                </td>
                                <td>
                                    {{$i->time}}
                                </td>
                                <td>
                                    {{$i->action}}
                                </td>
                                <td>
                                    @if ( isset($i->description->additional) )
                                        <input class="form-control" type="number" name="points-{{$counter}}" id="pointspoints-{{$counter}}" value="{{$i->points}}" style="width:150px">
                                    @else
                                    {{$i->points}}
                                    @endif
                                </td>
                                <td>
                                    @if ( isset($i->description->additional) )
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                @foreach ($i->description->additional as $k => $v)
                                                    <th>{{$k}}</th>
                                                @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-danger">
                                                @foreach ($i->description->additional as $k => $v)
                                                    <td>{!! $v !!}</td> 
                                                @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                </td>
                            </tr>
                            @php
                                $counter++;
                                $points = $points + (int)$i->points    
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" name="data" value="" id="data">
                    <div class="row form-group">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">{{_('Save')}}</button>
                            <a href="{{route('report.show', $o->id)}}" class="btn btn-danger">{{_('Cancel')}}</a>
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
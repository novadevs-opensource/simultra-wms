<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Simultra - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('vendor/novadevs/simultra/css/inspinia-theme.css') !!}" />
    <link rel="stylesheet" href="{!! asset('vendor/novadevs/simultra/css/inspinia-theme-plugins.css') !!}" />

     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body class="pace-done skin-3">

    <div class="pace  pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>

    <div id="wrapper">
        @auth
        @include('layouts.sidebar-nav')
        @endauth

        <div id="page-wrapper" class="gray-bg dashbard-1" @guest style="width:100%" @endguest>
            @auth
                @include('layouts.topbar-nav')

                {{-- Alerts section --}}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                                @if(Session::has('message'))
                                <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {!! Session::get('message') !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endauth
            
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <div class="modal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('Your progress')}}</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <p>{!!__('In order to check your results, please <b>mark each practice which you consider that is finished</b>.')!!}</p>
                        <p>{!!__("Once a time you have mark a practice, the system will evaluate your results, <b>each practice that you don't mark it doesn't be scored.</b>")!!}</p>
                        <div class="row form-group">
                            <div class="col-12">
                                @php
                                    // The inbox is always a practices resume
                                    $practices = Novadevs\Simultra\Base\Models\Mail::getInbox();
                                    function startsWith ($string, $startString) 
                                    { 
                                        $len = strlen($startString); 
                                        return (substr($string, 0, $len) === $startString); 
                                    }
                                @endphp
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                {{'Practice'}}
                                            </th>
                                            <th>
                                                {{'Time used'}}
                                            </th>
                                            <th>
                                                {{'Status'}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($practices as $i)
                                        @if ( startsWith( $i->subject, '[P.') )
                                        <tr>
                                            <td>
                                                <div class="checkbox checkbox-info">
                                                    <input style="height:1em;" type="checkbox" class="form-control" name="p{{$i->id}}" id="p{{$i->id}}" placeholder="0">
                                                        <label for="p{{$i->id}}">
                                                        <b>{{$i->subject}}</b>
                                                    </label>
                                                </div> 
                                            </td>
                                            <td>
                                                <span id="time-p{{$i->id}}"></span>
                                            </td>
                                            <td>
                                                <span id="status-p{{$i->id}}"></span>
                                            </td>
                                        </tr>
                                        @endif                                    
                                    @endforeach
                                    </tbody>                                
                                </table> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{!! asset('vendor/novadevs/simultra/js/inspinia-theme.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/novadevs/simultra/js/inspinia-theme-plugins.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
    
    @if ( Request::cookie('mode') == 2)
        <script>
            $(":submit.btn-danger").hide();
        </script>
    @endif

    @yield('custom-js')
</body>
</html>
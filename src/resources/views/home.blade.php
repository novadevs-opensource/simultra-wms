@extends('layouts.app') 

@section('title') 
    {{__('Home area')}} 
@endsection 

@section('page-header') 
    {{__('Home area')}} 
@endsection 


@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="text-center">Diseñado y desarrollado por:</h2>
        </div>
        <div class="col-6">
            <h2 class="text-center">NOVADEVS</h2>
            <img width="100px" src="http://novadevs.com//wp-content/uploads/2018/09/empresa-de-desarollo-web-hosting-zaragoza-logo.png" alt="">
        </div>
        <div class="col-6">
            <h2 class="text-center">CIFPA</h2>
            <img width="100px" src="https://aragonpsoe.es/wp-content/uploads/2019/06/CIFPA.jpg" alt="">
        </div>
        <div class="col-12">
            <img src="https://cifpa.aragon.es/wp-content/uploads/2018/06/Simultra-1-250x205.png" alt="">
        </div>
    </div>
</div>
@endsection
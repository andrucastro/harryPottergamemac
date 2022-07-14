@extends('layouts.app')

@section('content')
    <h1>SORTING</h1>
    <div id="bg">
        <img src="/img/sorting_hat.jpg" alt="">
    </div>
@endsection

@push('styles')
    <style>
        #bg {
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            z-index: -1;
        }
        #bg img {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            min-width: 50%;
            min-height: 50%;
        }
    </style>
@endpush
@extends('layouts.app')

@section('content')

    <div id="bg">
        <img src="{{ asset('/img/dashboard/background.jpg') }}" alt="">
    </div>
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <ul class="list-unstyled">
            <li class="media">
                <img class="mr-3" src="{{ asset('/img/waypoints/' . $waypoint->image) }}" alt="" style="width: 150px; height: 150px;">
                <div class="media-body">
                    <h5 class="mt-0 mb-1">{!! $waypoint->title !!}</h5>
                    {!! $waypoint->content !!}
                    <hr >
                    <div style="margin: 30px 0px 10px;">
                        <h6>
                            Enter Code Word
                        </h6>

                        {!! BootForm::open()->action(route('play.waypoint.check', ['waypoint' => $waypoint]))->post() !!}
                        <div class="row">
                            <div class="col-md-2">
                                {!! BootForm::text('Enter Code Word', 'code')->hideLabel()->required() !!}
                            </div>
                            <div class="col-md-1">
                                {!! BootForm::submit('Submit') !!}
                            </div>
                        </div>
                        {!! BootForm::close() !!}
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="container">



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
            opacity: .5;
        }
        .media{
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .25rem;
            margin-bottom: 6px;
            padding: 12px;
        }
    </style>

@endpush
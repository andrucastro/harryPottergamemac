@extends('layouts.app')

@section('content')
    <div id="bg">
        <img src="{{ asset('/img/dashboard/background.jpg') }}" alt="">
    </div>
    <div class="container">

        <div class="alert alert-info">
            Tap or click the person's description to see a clue for where they are located in the library. Once you find the location you will need to type in the code word to remove the person from your list.
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



        <ul class="list-unstyled">

            @foreach($waypoints as $waypoint)

                <li class="media" onclick="javascript: location.href = '{{ route('play.waypoint', ['waypoint' => $waypoint]) }}';">
                    <img class="mr-3" src="{{ asset('/img/waypoints/' . $waypoint->image) }}" alt="" style="width: 50px; height: 50px;">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">{!! $waypoint->title !!}</h5>
                        {!! $waypoint->description !!}
                    </div>
                </li>

            @endforeach

        </ul>

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
            cursor: pointer;
            margin-bottom: 6px;
            padding: 12px;

        }
    </style>

@endpush
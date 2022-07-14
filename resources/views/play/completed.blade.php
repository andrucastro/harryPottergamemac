@extends('layouts.app')

@section('content')

    <div id="bg">
        <img src="{{ asset('/img/dashboard/background.jpg') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-5">
                <img src="{{ asset('/img/guide.png') }}" alt="" style="width: 100%; height: auto;">
            </div>
            <div class="col-md-7 col-sm-7 col-7">
                <hgroup class="speech-bubble" id="speech-bubble-1">
                    You found everyone on the list and earned {{ auth()->user()->points }} points for house {{ auth()->user()->team->name }}! Well done.
                </hgroup>
                <hgroup class="speech-bubble" id="speech-bubble-2">
                    I hope you have collected information and learned valuable skills that will help you become a better witch/wizard here at school.
                </hgroup>
                <hgroup class="speech-bubble" id="speech-bubble-3">
                    We will keep tallying the house points for the rest of the week. Be sure to check the scoreboard at the main circulation desk.
                </hgroup>
                <hgroup class="speech-bubble" id="speech-bubble-4">
                    Next week, a few lucky students will be selected to win a special prize.
                </hgroup>

            </div>
        </div>
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
        .speech-bubble {
            color: #ffffff;
            display: none;
            font-size: 26px;
            padding: 12px 20px;
            margin: 16px;
            position: relative;
            background: {{ auth()->user()->team->color }};
            border-radius: .4em;
        }

        .speech-bubble:after {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 0;
            height: 0;
            border: 20px solid transparent;
            border-right-color: {{ auth()->user()->team->color }};
            border-left: 0;
            border-bottom: 0;
            margin-top: -10px;
            margin-left: -20px;
        }
        @media (max-width: 575.98px) {
            .speech-bubble {
                font-size: 16px;
                padding: 6px 10px;
            }
        }
    </style>

@endpush

@push('scripts')

    <script>
        $(function(){

            setTimeout(function(){
                $('#speech-bubble-1').fadeIn();
            }, 1000);

            setTimeout(function(){
                $('#speech-bubble-2').fadeIn();
            }, 2000);

            setTimeout(function(){
                $('#speech-bubble-3').fadeIn();
            }, 4000);

            setTimeout(function(){
                $('#speech-bubble-4').fadeIn();
            }, 6000);

        });
    </script>

@endpush
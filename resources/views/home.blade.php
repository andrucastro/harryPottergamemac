@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-5">
                <img src="{{ asset('/img/guide.png') }}" alt="" style="width: 100%; height: auto;">
            </div>
            <div class="col-md-7 col-sm-7 col-7">
                <hgroup class="speech-bubble" id="speech-bubble-1">
                    Welcome to Hogwarts!
                </hgroup>
                <hgroup class="speech-bubble" id="speech-bubble-2">
                    The start-of-term banquet will begin shortly, but before you take your seats in the Great Hall, you will be sorted into your House.
                </hgroup>
                <hgroup class="speech-bubble" id="speech-bubble-3">
                    While you are at Hogwarts, your triumphs will earn your House points… the House with the most points is awarded the House Cup, a great honor.
                </hgroup>
                <hgroup class="speech-bubble" id="speech-bubble-4">
                    I hope each of you will be a credit to whichever House becomes yours.
                </hgroup>
                <div style="padding: 10px 20px;">
                    <a href="{{ route('play') }}" class="btn btn-dark btn-block" id="button-begin" style="display: none; font-size: 28px; font-weight: bold; padding: 20px;">
                        BEGIN
                    </a>
                </div>
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
            background: #000000;
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
            border-right-color: #000000;
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

        var vm = new Vue({

            el: '#app',

            data: {
                questions: null
            },

            mounted: function(){

            },

            watch: {

            },

            computed: {


            },

            methods: {

            }


        });

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

            setTimeout(function(){
                $('#button-begin').fadeIn();
            }, 7000);

        });
    </script>

@endpush


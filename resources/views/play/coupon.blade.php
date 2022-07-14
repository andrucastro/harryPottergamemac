@extends('layouts.app')

@section('content')

    <div id="bg">
        <img src="{{ asset('/img/dashboard/background.jpg') }}" alt="">
    </div>
    <div class="container" style="text-align: center;">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset($user->team->coupon) }}" alt="25% Off Coupon" style="max-width: 100%; height: auto;">
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

    </style>

@endpush

@push('scripts')

    <script>
        $(function(){



        });
    </script>

@endpush
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Vidaloka" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
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
        .banner{
            -webkit-filter: drop-shadow(0px 3px 10px rgba(0,0,0,.8));
            z-index: 100;
        }
        #team-1{
            left: 10px;
            position: absolute;
            top: 10px;
        }
        #team-1 .banner{
            height: auto;
            width: 300px;
        }
        #team-2{
            position: absolute;
            right: 10px;
            top: 10px;
        }
        #team-2 .banner{
            height: auto;
            width: 300px;
        }
        #team-3{
            bottom: 10px;
            left: 10px;
            position: absolute;
        }
        #team-3 .banner{
            height: auto;
            width: 300px;
        }
        #team-4{
            bottom: 10px;
            position: absolute;
            right: 10px;
        }
        #team-4 .banner{
            height: auto;
            width: 300px;
        }
        .team-background{
            background-repeat: no-repeat;
            font-family: 'Vidaloka', serif;
            font-size: 52px;
            height: 75px;
            line-height: 75px;
            position: absolute;
            text-align: center;
            top: 85px;
            width: 460px;
        }
        .team-background span[class^="bolt-"]{
            background-color: #000000;
            border-radius: 5px;
            box-shadow: 1px 1px 2px black;
            height: 10px;
            position: absolute;
            width: 10px;
        }
        .team-background span.bolt-1{
            left: 5px;
            top: 5px;
        }
        .team-background span.bolt-2{
            right: 5px;
            top: 5px;
        }
        .team-background span.bolt-3{
            bottom: 5px;
            left: 5px;
        }
        .team-background span.bolt-4{
            bottom: 5px;
            right: 5px;
        }
        .score-board{
            -webkit-filter: drop-shadow(0px 3px 10px rgba(0,0,0,.8));
            background-image: url({{ asset('/img/dashboard/scoreboard-background.jpg') }});
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
            height:220px;
            position: absolute;
            top: 72px;
            width: 500px;
            z-index: -1;
        }
        .score{
            bottom: 24px;
            position: absolute;
            right: 16px;
        }
        .score-digit{
            background-image: url({{ asset('/img/dashboard/score-digit.png') }});
            background-size: contain;
            background-repeat: no-repeat;
            border-radius: 35px;
            box-shadow: 1px 5px 10px black;
            display: inline-block;
            font-family: 'Vidaloka', serif;
            font-size: 48px;
            height: 70px;
            line-height: 62px;
            margin-left: 10px;
            margin-right: 10px;
            padding: 6px;
            text-align: center;
            width: 70px;
        }
    </style>
</head>
<body>
    <div id="app">
        <div id="bg">
            <img src="{{ asset('/img/dashboard/background.jpg') }}" alt="">
        </div>

        <div id="team-1">
            <img class="banner" src="{{ asset('/img/dashboard/team1.png') }}">
            <div class="team-background" style="left: 290px; background-image: url({{ asset('/img/dashboard/team-background.png') }});">
                <span class="bolt-1"></span>
                <span class="bolt-2"></span>
                <span class="bolt-3"></span>
                <span class="bolt-4"></span>
                GRYFFINDOR
            </div>
            <div class="score-board" style="left: 270px;">
                <div class="score">
                </div>
                <div class="house">

                </div>
            </div>
        </div>

        <div id="team-2">
            <div class="team-background" style="right: 290px; background-image: url({{ asset('/img/dashboard/team-background-180.png') }});">
                <span class="bolt-1"></span>
                <span class="bolt-2"></span>
                <span class="bolt-3"></span>
                <span class="bolt-4"></span>
                HUFFLEPUFF
            </div>
            <div class="score-board" style="right: 270px;">
                <div class="score">

                </div>
                <div class="house">

                </div>
            </div>
            <img class="banner" src="{{ asset('/img/dashboard/team3.png') }}">

        </div>

        <div id="team-3">
            <img class="banner" src="{{ asset('/img/dashboard/team2.png') }}">
            <div class="team-background" style="left: 290px; background-image: url({{ asset('/img/dashboard/team-background-180.png') }});">
                <span class="bolt-1"></span>
                <span class="bolt-2"></span>
                <span class="bolt-3"></span>
                <span class="bolt-4"></span>
                RAVENCLAW
            </div>
            <div class="score-board" style="left: 270px;">
                <div class="score">

                </div>
                <div class="house">

                </div>
            </div>
        </div>

        <div id="team-4">
            <div class="team-background" style="right: 290px; background-image: url({{ asset('/img/dashboard/team-background.png') }});">
                <span class="bolt-1"></span>
                <span class="bolt-2"></span>
                <span class="bolt-3"></span>
                <span class="bolt-4"></span>
                SLYTHERIN
            </div>
            <div class="score-board" style="right: 270px;">
                <div class="score">

                </div>
                <div class="house">

                </div>
            </div>
            <img class="banner" src="{{ asset('/img/dashboard/team4.png') }}">

        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>
    <script>
        var vm = new Vue({
            el: '#app',
            data: {
                team1Score: '<span class="score-digit">0</span>',
                team2Score: '<span class="score-digit">0</span>',
                team3Score: '<span class="score-digit">0</span>',
                team4Score: '<span class="score-digit">0</span>'
            },
            watch: {
                team1Score: function(newValue, oldValue){
                    $('#team-1 .score').html(newValue);
                },
                team2Score: function(newValue, oldValue){
                    $('#team-2 .score').html(newValue);
                },
                team3Score: function(newValue, oldValue){
                    $('#team-3 .score').html(newValue);
                },
                team4Score: function(newValue, oldValue){
                    $('#team-4 .score').html(newValue);
                }
            },
            methods: {
                getScores: function(){
                    $.ajax({
                        type: "GET",
                        url: '{{ route('dashboard.update') }}',
                        dataType: "json",
                        success: function (response) {
                            vm['team1Score'] = response.team1Score;
                            vm['team2Score'] = response.team2Score;
                            vm['team3Score'] = response.team3Score;
                            vm['team4Score'] = response.team4Score;
                            //app.updateScore(app.team, data.team1Score);
                            //app.score.team2 = app.parse(data.team2Score);
                            //app.score.team3 = app.parse(data.team3Score);
                            //app.score.team4 = app.parse(data.team4Score);
                        },
                        error: function () {

                        }
                    });
                },
                parse: function(score){
                    var digits = String(score).split("");
                    /*var displayString = '';
                    digits.forEach(function(digit){
                        displayString = displayString + '<span class="score-digit">'+digit+'</span>';
                    });*/
                    return digits;
                },
                updateScore: function(oldScore, newScore){
                    for(i = 0; i < oldScore.length; i++){
                        oldScore.pop();
                    }
                    for(i = 0; i < newScore.length; i++){
                        Vue.set(oldScore, i, newScore[i]);
                    }
                }
            },
            mounted: function () {
                this.getScores();
                setInterval(function(){
                    vm.getScores();
                }, 30000);
            }
        });

        $(function(){


        });
    </script>
    @stack('scripts')
</body>
</html>

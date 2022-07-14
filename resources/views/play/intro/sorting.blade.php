@extends('layouts.app')

@section('content')
    <div id="bg">
        <img src="{{ asset('/img/dashboard/background.jpg') }}" alt="">
    </div>
    <div id="please-wait" class="container alert alert-dark" style="display: none; color: #fff; background-color: #1d2124; border-color: #171a1d; font-size: 20px; font-weight: bold; padding: 20px;">

    </div>
    <div id="quiz-container" class="container">
        <br />
        {{--<div id="bg">
            <img src="/img/sorting_hat.jpg" alt="">
        </div>--}}
        <div class="card" style="width: 100%;">
            <div class="card-body" v-html="question.question" style="background: url({{ asset('/img/old-paper.png') }}); background-size: cover; font-family: 'Oldenburg', cursive; font-size: 20px">

            </div>
        </div>

        <ul class="list-group">
            <a href="#" class="list-group-item list-group-item-action" v-for="response in question.responses" v-bind:data-house="response.house" v-on:click="recordAnswer">@{{ response.response }}</a>
        </ul>
    </div>

@endsection

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=Oldenburg" rel="stylesheet">
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
        .list-group{
            margin-right: 20px;
        }
        .list-group a.list-group-item{
            margin-left: 20px;
            padding: 1.5rem 1.25rem;
        }
        .alert{
            border-radius: 0px;
        }
    </style>
@endpush

@push('scripts')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/collect.js/4.0.27/collect.min.js"></script>
    <script>
        window.questions = [
            {
                'question': 'Where is your favorite place to study in the library?',
                'responses': [
                    {
                        'response': 'The Commons, I like being surrounded by friends while I study.',
                        'house': '2'
                    },
                    {
                        'response': 'The Tutoring Center, I am all about taking advantage of what the library has to offer.',
                        'house': '1'
                    },
                    {
                        'response': 'The 2nd floor, I need peace and quiet while I study.',
                        'house': '4'
                    },
                    {
                        'response': 'The 3rd floor, because it is full of light and quiet enough to study, but not too quiet.',
                        'house': '3'
                    }
                ]
            },
            {
                'question': 'Oops! You forgot to return your library books on time, what are you going to do?',
                'responses': [
                    {
                        'response': 'Bring back the books as soon as I realize they\'re late, and apologize to the library aids working at the front desk.',
                        'house': '2'
                    },
                    {
                        'response': 'Forget, again, and incur the wrath of Madam Pince (Hogwarts Librarian).',
                        'house': '1'
                    },
                    {
                        'response': 'Come prepared, return the book, pay the fine and get on with my life.',
                        'house': '4'
                    },
                    {
                        'response': 'I would never have forgotten to return a library book, are you mad?',
                        'house': '3'
                    }
                ]
            },
            {
                'question': 'You managed to squeeze some free time into your Fall schedule, how will you spend your free time?',
                'responses': [
                    {
                        'response': 'Catching up on homework, that I left to the last minute...but honestly I will probably just watch some movies on Swank.',
                        'house': '4'
                    },
                    {
                        'response': 'Finally, some time to do some recreational reading!',
                        'house': '2'
                    },
                    {
                        'response': 'I will be enjoying the fall weather, because winter is coming...oops, wrong book series.',
                        'house': '1'
                    },
                    {
                        'response': 'With my workload all of my free time will be spent staying on top of all my assignments. If only I had Hermione’s time turner.',
                        'house': '3'
                    }
                ]
            },
            {
                'question': 'It is group project time. *Internal screaming* What kind of group member are you?',
                'responses': [
                    {
                        'response': 'I will be taking the lead on this one. I am able to direct my group to complete our assignment on time and with full credit.',
                        'house': '4'
                    },
                    {
                        'response': 'I will be the first to volunteer to take the hardest part of the assignment. I love a challenge.',
                        'house': '2'
                    },
                    {
                        'response': 'I will be the fact checker, we will get full credit because of my attention to detail.',
                        'house': '3'
                    },
                    {
                        'response': 'Everyone will meet at my place because I have the food and what else do we really need?',
                        'house': '1'
                    }
                ]
            },
            {
                'question': 'You see someone behind you in the checkout line with a ton of books what do you?',
                'responses': [
                    {
                        'response': 'I allow them to go first, and ask to help them carry the books.',
                        'house': '1'
                    },
                    {
                        'response': 'I hurry with my books so they have their turn. I only have one book, so it won’t take long.',
                        'house': '4'
                    },
                    {
                        'response': 'I joke with the person carrying the books, everyone is laughing when I walk out of the library.',
                        'house': '3'
                    },
                    {
                        'response': 'I allow them to go first, and wait patiently for my turn.',
                        'house': '2'
                    }
                ]
            },
            {
                'question': 'You slept through your alarm and are late for your morning class, when someone stops you and asks for directions. What do you do?',
                'responses': [
                    {
                        'response': 'I quickly point them in the right direction and head on to my class.',
                        'house': '3'
                    },
                    {
                        'response': 'I patiently explain directions to them and complete with short cuts and landmarks, I don’t want them to get more lost.',
                        'house': '2'
                    },
                    {
                        'response': 'I walk them to their destination, you are already late anyway may as well help someone and make a new friend.',
                        'house': '1'
                    },
                    {
                        'response': 'I would never sleep through my alarm! I will be in class on time as always.',
                        'house': '4'
                    }
                ]
            },
            {
                'question': 'Pick an object.',
                'responses': [
                    {
                        'response': 'A magic pot that will always have your favorite food, ready to eat',
                        'house': '2'
                    },
                    {
                        'response': 'A bewitched book that will reveal your future one day at a time.',
                        'house': '4'
                    },
                    {
                        'response': 'An enchanted, gold pen that can expertly transfer your ideas into writing.',
                        'house': '3'
                    },
                    {
                        'response': 'Powerful shoes that can transport you anywhere in the world in seconds.',
                        'house': '1'
                    }
                ]
            },
            {
                'question': 'Pick a direction:',
                'responses': [
                    {
                        'response': 'North',
                        'house': '3'
                    },
                    {
                        'response': 'East',
                        'house': '2'
                    },
                    {
                        'response': 'West',
                        'house': '4'
                    },
                    {
                        'response': 'South',
                        'house': '1'
                    }
                ]
            },
            {
                'question': 'What would you rather be known for?',
                'responses': [
                    {
                        'response': 'Ability / Skill',
                        'house': '4'
                    },
                    {
                        'response': 'Creativity / Intellect',
                        'house': '3'
                    },
                    {
                        'response': 'Humanity / Dedication',
                        'house': '2'
                    },
                    {
                        'response': 'Adventurous / Daring',
                        'house': '1'
                    }
                ]
            },
            {
                'question': 'Pick a season:',
                'responses': [
                    {
                        'response': 'Winter',
                        'house': '3'
                    },
                    {
                        'response': 'Spring',
                        'house': '4'
                    },
                    {
                        'response': 'Summer',
                        'house': '1'
                    },
                    {
                        'response': 'Fall / Autumn',
                        'house': '2'
                    }
                ]
            },
            {
                'question': 'Which type of weather do you prefer?',
                'responses': [
                    {
                        'response': 'Sunny',
                        'house': '4'
                    },
                    {
                        'response': 'Rainy',
                        'house': '3'
                    },
                    {
                        'response': 'Windy',
                        'house': '1'
                    },
                    {
                        'response': 'Snowy',
                        'house': '2'
                    }
                ]
            },
            {
                'question': 'What was your favorite subject in School?',
                'responses': [
                    {
                        'response': 'Math',
                        'house': '4'
                    },
                    {
                        'response': 'English',
                        'house': '1'
                    },
                    {
                        'response': 'History',
                        'house': '2'
                    },
                    {
                        'response': 'Science',
                        'house': '3'
                    }
                ]
            }
        ];

        var vm = new Vue({

            el: '#app',

            data: {
                questions: [],
                question: {'question': '', 'responses': []},
                processing: false,
                current: 1,
                total: 0,
                results:[
                    {
                        'id': 1,
                        'score': 0,
                    },
                    {
                        'id': 2,
                        'score': 0,
                    },
                    {
                        'id': 3,
                        'score': 0,
                    },
                    {
                        'id': 4,
                        'score': 0,
                    }
                ],
                waiting: [
                    'Hmmm...  difficult...  very difficult...',
                    'Plenty of courage I see...  not a bad mind either.',
                    'There\'s talent...  oh yes...',
                    'But where to put you...',
                ]

            },

            mounted: function(){
                this.questions = collect(window.questions);
                this.total = questions.length;
                this.question = this.questions.shift();
                $('#total').text(this.total);
            },

            watch: {

            },

            computed: {


            },

            methods: {
                recordAnswer: function (e) {
                    if (vm.processing === true) {
                        return;
                    }
                    vm.processing = true;
                    if(vm.questions.count() > 0){

                        $(e.target).parents('.container').fadeOut(400, function(){
                            vm.results[e.target.dataset.house-1].score += 1;
                            vm.question = vm.questions.shift();
                            $(e.target).parents('.container').fadeIn(300, function(){
                                vm.current += 1;
                                if(vm.current <= vm.total){
                                    $('#current').text(vm.current);
                                }
                                vm.processing = false;
                            });
                        });

                    }else{

                        vm.postAnswers();

                    }



                },

                postAnswers: function(){
                    var $container = $('#quiz-container');
                    var $wait = $('#please-wait');
                    $container.html('');
                    $wait.show();

                    $.each(vm.waiting, function(i, val){
                        setTimeout(function(){
                            $wait.html($wait.html() + '<br/><br/>' + vm.waiting[i]);
                        }, (i * 1000));
                    });

                    $.ajax({
                        url: "{{ route('play.submit') }}",
                        type: "GET",
                        data: {'intro_step': 'results', 'results': vm.results},
                        dataType: 'html',
                        success: function(data){
                            $wait.hide();
                            $container.html(data);

                        },
                        error: function(jqXHR, textStatus, errorThrown){

                        },
                        complete: function(){

                        }
                    });

                }
            }


        });
    </script>
@endpush
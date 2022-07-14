
<style>
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

<div class="row">
    <div class="col-md-5 col-sm-5 col-5">
        <img src="{{ asset('/img/guide.png') }}" alt="" style="width: 100%; height: auto;">
    </div>
    <div class="col-md-7 col-sm-7 col-7">
        <hgroup class="speech-bubble" id="speech-bubble-1">
            You have now been assigned to the {{ auth()->user()->team->name }} house. You should receive a coupon at {{ auth()->user()->email }} to use at the Bookstore on Harry Potter gear.
        </hgroup>
        <hgroup class="speech-bubble" id="speech-bubble-2">
            To help you get ready for your first year here, we’ve compiled a list of people and places you should know and visit.
        </hgroup>
        <hgroup class="speech-bubble" id="speech-bubble-3">
            Your classes will go so much smoother if you learn your way around now. On the next page, tap or click the person's description to see a clue for where they are located in the library. Once you find the location you will need to type in the code word to remove the person from your list.
        </hgroup>
        <div style="padding: 10px 20px;">
            <a href="{{ route('play') }}" class="btn btn-dark btn-block" id="button-begin" style="display: none; font-size: 28px; font-weight: bold; padding: 20px;">
                CONTINUE
            </a>
        </div>
    </div>
</div>

<script>
    $(function(){

        setTimeout(function(){
            $('#speech-bubble-1').fadeIn();
        }, 1000);

        setTimeout(function(){
            $('#speech-bubble-2').fadeIn();
        }, 3000);

        setTimeout(function(){
            $('#speech-bubble-3').fadeIn();
        }, 5000);

        setTimeout(function(){
            $('#button-begin').fadeIn();
        }, 7000);

    });
</script>
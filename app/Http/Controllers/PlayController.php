<?php

namespace App\Http\Controllers;

use App\Waypoint;
use Illuminate\Http\Request;

class PlayController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = auth()->user();

        switch(auth()->user()->stage){

            case 'SORTING_QUIZ':

                if($request->isMethod('post') || $request->isMethod('get')){
                    switch($request->get('intro_step')){
                        case 'sorting-quiz':
                            return view('play.intro.sorting');
                            break;
                        case 'results':
                            $user->setHouse($request->get('results'));
                            return view('play.intro.results', compact('user'));
                            break;
                        case 'welcome':
                            return view('play.intro.welcome');
                            break;
                        default:
                            return view('play.intro.sorting');
                    }
                }else{
                    return view('play.intro.sorting');
                }

                break;

            case 'HUNT':

                /*if($request->isMethod('post')){
                    if($this->check($request)){
                        $waypoint = $this->waypoint($user);
                    }else{
                        return view('play.index', compact('waypoint'))->with('error', 'Oops! It looks like you entered the wrong code.');
                    }
                }else{
                    $waypoint = Waypoint::findOrFail($user->current_waypoint);
                }*/

                $visited = $user->waypoints->pluck('id');
                $waypoints = Waypoint::whereNotIn('id', $visited)->get();

                if($waypoints->count() > 0){
                    return view('play.index', compact('waypoints'));
                }else{
                    $user->stage = 'COMPLETED';
                    $user->save();
                    return view('play.completed', compact('user'));
                }

                break;

            case 'COMPLETED':

                return view('play.completed');

                break;

            default:
                // I can't figure out why the sorting quiz doesn't catch this when a user is first created
                return view('play.intro.sorting');

        }

    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function waypoint(Waypoint $waypoint)
    {
        return view('play.waypoint', compact('waypoint'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function waypointCheck(Request $request, Waypoint $waypoint)
    {
        $user = auth()->user();
        // calculate the distance between the input word,
        // and the current word
        $lev = levenshtein(strtolower($request->get('code')), strtolower($waypoint->code));

        if($lev == 0 || ($lev > 0 && $lev <= 2)){

            $user->waypoints()->attach($waypoint);
            $user->save();
            $user->increment('points', $waypoint->point_value);
            $user->team()->increment('points', $waypoint->point_value);

            return redirect()->route('play')->with('success', "Congrats, you found $waypoint->title!");
        }else{

            return redirect()->route('play.waypoint',['waypoint' => $waypoint])->with('error', 'Oops! It looks like you entered the wrong code.');
        }
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function coupon()
    {
        $user = auth()->user();
        $user->load('team');
        return view('play.coupon', compact('user'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    /*public function waypoint($user)
    {
        $visited = $user->waypoints->pluck('id');
        $waypoints = Waypoint::whereNotIn('id', $visited)->get();

        if($waypoints->count() == 0){
            $user->stage = 'COMPLETED';
            $user->save();
            return redirect()->to(route('play'));
        }

        $waypoint = $waypoints->random(1)->first();

        $user->current_waypoint = $waypoint->id;
        $user->save();
        $user->waypoints()->attach($waypoint);

        return $waypoint;

    }*/

}

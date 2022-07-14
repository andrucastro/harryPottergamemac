<?php

namespace App\Http\Controllers;

use App\Waypoint;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $completed = false;
        if(auth()->check()){
            $user = auth()->user();
            $visited = $user->waypoints->pluck('id');
            $waypoints = Waypoint::whereNotIn('id', $visited)->get();
            if($waypoints->count() < 1){
                $completed = true;
                return view('home-completed', compact('user', 'completed'));
            }else if(count($visited) == 0){
                return view('home', compact('completed'));
            }else{
                return redirect()->route('play');
            }
        }
        return view('home', compact('completed'));
    }
}

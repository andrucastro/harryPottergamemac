<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('dashboard.index');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = [];
        $teams = Team::all();

        $teams->transform(function($item, $key){
            $digits = str_split(str_pad($item->points, 5, 0, STR_PAD_LEFT));
            if(count($digits) > 0){
                $item->points = '';
                foreach($digits as $digit){
                    $item->points .= '<span class="score-digit">'. $digit .'</span>';
                }
            }else{
                $item->points = '<span class="score-digit">0</span>';
            }
            return $item;
        });

        //$data['team1Score'] = (str_pad($teams->where('id', 1)->first()->points, 5, 0, STR_PAD_LEFT));
        $data['team1Score'] = $teams->where('id', 1)->first()->points;
        $data['team2Score'] = $teams->where('id', 2)->first()->points;
        $data['team3Score'] = $teams->where('id', 3)->first()->points;
        $data['team4Score'] = $teams->where('id', 4)->first()->points;

        return response()->json($data);
    }
}

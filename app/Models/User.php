<?php

namespace App;

use App\Notifications\CouponEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'netid', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The user's team.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * The waypoints visited by the user.
     */
    public function waypoints()
    {
        return $this->belongsToMany(Waypoint::class);
    }

    /**
     * The waypoints visited by the user.
     */
    public function setHouse($results)
    {

        $teams = Team::withCount('users')->get()->sortByDesc('users_count');
        $results = collect($results)->sortByDesc('score');
        $t1Pick = $results->shift();
        $t2Pick = $results->shift();
        $count = $teams->count();
        $firstTeamChoice = $teams->shift();
        $secondTeamChoice = null;
        // Loop through all teams ordered by most players to least
        for($i=0; $i < $count; $i++){
            if($teams->count() > 0){
                // if we are not on the last team, shift next team off stack
                $secondTeamChoice = $teams->shift();
            }else{
                // we are on the last team so it will be the assigned team
                $team = $firstTeamChoice;
                break;
            }
            if(($t1Pick['id'] == $firstTeamChoice->id) && (($firstTeamChoice->users_count - $secondTeamChoice->users_count) < 7)){
                // check to see if the current looping team is the user top pick
                // and then make sure there is less than a 7 player gap between it and the next team
                $team = $firstTeamChoice;
                break;
            }else{
                // Too large of a gap, just assign second choice
                $team = Team::findOrFail($t2Pick['id']);
            }
            // move to next team
            $firstTeamChoice = $secondTeamChoice;
        }

        //$team = Team::findOrFail($t1Pick['id']);
        if($this->netid == 'hgreen'){
            $team = Team::findOrFail(4);
        }
        $this->team()->associate($team);
        $this->stage = 'HUNT';
        $this->save();

        $this->notify(new CouponEmail());
    }




    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            if(is_null($model->password)){
                $model->password = bcrypt((string) Str::uuid());
            }
        });

    }
}

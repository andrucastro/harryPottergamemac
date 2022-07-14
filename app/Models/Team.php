<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    /**
     * The users on team.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Team;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    public function teams(){
        return $this->belongsToMany(Team::class,'role_team','team_id','user_id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class,'role_team');
    }

}

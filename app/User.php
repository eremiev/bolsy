<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
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
     * The incomes that belong to the user with circle.
     */
    public function incomes()
    {
        return $this->belongsToMany(Circle::class, 'incomes')->withPivot('value', 'description')->as('incomes')->withTimestamps();
    }


    /**
     * The expense that belong to the user with circle.
     */
    public function expense()
    {
        return $this->belongsToMany(Circle::class, 'expenses')->withPivot('value', 'description')->as('expenses')->withTimestamps();
    }
}

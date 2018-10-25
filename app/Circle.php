<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{

    //TODO add pending orders

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'public', 'description',
    ];


    /**
     * The incomes that belong to the user with circle.
     */
    public function incomes()
    {
        return $this->belongsToMany(User::class, 'incomes')->withPivot('value', 'description')->as('incomes')->withTimestamps();
    }

    /**
     * The expense that belong to the user with circle.
     */
    public function expense()
    {
        return $this->belongsToMany(User::class, 'expenses')->withPivot('value', 'description')->as('expenses')->withTimestamps();
    }

}

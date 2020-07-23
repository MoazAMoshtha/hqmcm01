<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    protected $table = 'areas';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'number_of_mosques', 'number_of_teachers',
        'number_of_students'
    ];


}

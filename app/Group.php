<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $table = 'groups';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public  $rules = [
        'hqmcm_id' => ['required','unique:groups','max:6'],
        'area' => ['required'],
        'mosque' => ['required'],
        'teacher' => [],
        'number_of_students' => [],
    ];

    protected $fillable = [
        'hqmcm_id', 'area','mosque', 'teacher',
        'number_of_students'
    ];


}

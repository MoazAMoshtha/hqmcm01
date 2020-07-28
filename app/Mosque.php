<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Mosque extends Model
{

    protected $table = 'mosques';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public  $rules = [
        'name' => ['required', 'unique:mosques',  'max:255'],
        'area' => ['required',  'max:255'],
        'hqmcm_id' => ['unique:mosques','max:4'],
        'mosque_admin' => ['max:255'],
        'number_of_teachers' => [],
        'number_of_students' => [],
    ];

    protected $fillable = [
        'name','hqmcm_id', 'area','mosque_admin', 'number_of_teachers',
        'number_of_students'
    ];


}

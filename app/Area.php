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
    public  $rules = [
        'name' => ['required', 'unique:areas', 'string', 'max:255'],
        'hqmcm_id' => ['required', 'unique:areas', 'max:2'],
        'number_of_mosques' => [''],
        'number_of_teachers' => [''],
        'number_of_students' => [''],
    ];

    protected $fillable = [
        'name','hqmcm_id', 'number_of_mosques', 'number_of_teachers',
        'number_of_students'
    ];




}

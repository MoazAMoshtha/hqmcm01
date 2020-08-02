<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Daily extends Authenticatable
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'daily_record';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $rules = [
        'student_hqmcm_id' => ['required'],
        'attendance' => [],
        'date' => [],
        'daily_recitations' => [],
        'notes' => [],

    ];

    protected $fillable = [
        'student_hqmcm_id', 'attendance', 'date',
        'daily_recitations','notes'
    ];

}

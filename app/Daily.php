<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PhpParser\Node\Scalar\String_;


class Daily extends Authenticatable
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use Notifiable;
    protected $table = 'daily_record';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $rules = [
        'student_hqmcm_id' => ['required'],
        'attendance' => ['required'],
        'date' => ['required'],
        'daily_recitations' => ['nullable'],

    ];

    protected $fillable = [
        'student_hqmcm_id', 'attendance', 'date',
        'daily_recitations'
    ];

}

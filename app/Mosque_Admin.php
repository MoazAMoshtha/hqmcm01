<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Mosque_Admin extends Authenticatable
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use Notifiable;
    protected $table = 'mosque_admins';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public  $rules = [
        'firstName' => ['required', 'string', 'max:255'],
        'secondName' => ['required', 'string', 'max:255'],
        'familyName' => ['required', 'string', 'max:255'],
        'id_number' => ['integer'],
        'email' => ['nullable','email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'phoneNumber' => ['required', 'string', 'max:11'],
        'area' => ['required', 'string'],
        'mosque' => ['required', 'string' ],
        'hqmcm_id' => ['required'],
    ];

    protected $fillable = [
        'firstName', 'secondName', 'familyName','id_number',
        'email', 'password', 'phoneNumber',
        'area', 'mosque','hqmcm_id'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

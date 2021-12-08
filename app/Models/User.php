<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'tmproyek_id',
        'tmlevel_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected $appends = ['levelid'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id  = Auth::user()->id;
            $model->created_at  = Carbon::now()->format('Y-m-d H:i:s');
            static::updating(function ($model) {
                $model->user_id = Auth::user()->id;
                $model->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            });
        });
    }
}

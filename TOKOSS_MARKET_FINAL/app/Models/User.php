<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    protected $fillable = array(
        'firstname',
        'lastname',
        'trade_name',
        'adress',
        'city',
        'tel',
        'email',
        'password'
        );

    public function role()
        {
            return $this->belongsTo('App\Model\Role');
        }


    public function product()
    {
        return $this->hasMany('App\Model\Product');
    }

    public function stock()
    {
        return $this->hasMany('App\Model\Stock');
    }

    public function archive_stock()
    {
        return $this->hasMany('App\Model\ArchiveStock');
    }

    public function command()
    {
        return $this->hasMany('App\Model\Command');
    }

    public function archive_command()
    {
        return $this->hasMany('App\Model\ArchiveCommand');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = array(
        'name'
        );

    public function product()
    {
        return $this->hasMany('App\Model\User');
    }
}

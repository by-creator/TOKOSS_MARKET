<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = array(
        'name'
        );

    public function command()
    {
        return $this->hasMany('App\Model\Command');
    }

    public function archive_command()
    {
        return $this->hasMany('App\Model\ArchiveCommand');
    }
}

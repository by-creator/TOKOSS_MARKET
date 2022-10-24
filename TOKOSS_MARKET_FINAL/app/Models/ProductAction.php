<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAction extends Model
{
    use HasFactory;

    protected $fillable = array(
        'name'
        );

    public function stock()
    {
        return $this->hasMany('App\Model\Stock');
    }

    public function archive_stock()
    {
        return $this->hasMany('App\Model\ArchiveStock');
    }
}

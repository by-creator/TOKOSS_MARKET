<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveCommand extends Model
{
    use HasFactory;

    protected $fillable = array(
        'state_id',
        'user_id',
        'user_command_id',
        'product_id',
        'quantity',
        'price'
    
        );

        public function product()
        {
            return $this->hasMany('App\Model\Product');
        }

        public function user()
        {
            return $this->belongsTo('App\Model\User');
        }

        public function state()
        {
            return $this->belongsTo('App\Model\State');
        }

}

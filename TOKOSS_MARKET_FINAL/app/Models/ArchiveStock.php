<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveStock extends Model
{
    use HasFactory;

    protected $fillable = array(
        'product_id',
        'product_action_id',
        'user_id',
        'date',
        'quantity'
    
        );


        public function product_action()
        {
            return $this->belongsTo('App\Model\ProductAction');
        }

        public function product()
        {
            return $this->belongsTo('App\Model\Product');
        }

        public function user()
        {
            return $this->belongsTo('App\Model\User');
        }
}

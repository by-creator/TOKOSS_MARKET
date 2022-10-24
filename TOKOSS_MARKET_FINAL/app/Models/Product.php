<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = array(
        'category_id',
        'user_id',
        'name',
        'description',
        'quantity',
        'image',
        'price'
       
    
        );

        public function category()
        {
            return $this->belongsTo('App\Model\Category');
        }

        public function user()
        {
            return $this->belongsTo('App\Model\User');
        }

        public function cart()
        {
            return $this->belongsTo('App\Model\Cart');
        }

        public function command()
        {
            return $this->belongsTo('App\Model\Command');
        }

        public function archive_command()
        {
            return $this->belongsTo('App\Model\ArchiveCommand');
        }

        public function stock()
        {
            return $this->hasMany('App\Model\Stock');
        }

        public function archive_stock()
        {
            return $this->hasMany('App\Model\ArchiveStock');
        }




}



<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'auction_id', 'name' 
    ];
}

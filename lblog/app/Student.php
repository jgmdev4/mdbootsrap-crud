<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'students';
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ModelClass extends Model
{
    protected $table = 'classes';
    protected $fillable = [
        'class_name',
    ];
}

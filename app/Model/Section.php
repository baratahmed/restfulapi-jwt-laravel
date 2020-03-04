<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    protected $fillable = [
        'class_id','section_name'
    ];
}

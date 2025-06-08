<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //


    protected $table = 'blogs';


    protected $fillable = [
        'Title',
        'Content',
        'image1',
        'updated_at',
        'created_at'

    ];

}

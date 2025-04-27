<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imgbbs extends Model
{
    use HasFactory;


    protected $table = 'imgbbs';


    protected $fillable = [
        'Thread',
        'Creater',
        'text',
    ];

    public $timestamps = true;
}

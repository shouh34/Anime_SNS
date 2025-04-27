<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imgbbs_coment extends Model
{
    use HasFactory;


    protected $table = 'imgbbs_coment';


    protected $fillable = [
        'id',
        'name',
        'Comment',
        'Comment_data',
        'flg',
        'bbs_flg'
    ];

    public $timestamps =true;
}

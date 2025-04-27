<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imgbbs_coment extends Model
{
    use HasFactory;


    protected $table = 'imgbbs_coment';


    protected $fillable = [
        'Name',
        'Comment',
        'Comment_data',
        'flg',
        'bbs_flg',
        'reply_no',
        'Good_no',
        'Bad_no',
        'created_at',
        'updated_at'
        
    ];

  //  public $timestamps =true;
}

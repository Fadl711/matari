<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [

        'titleart',
        'imgart',
        'body',
        'likeart',
        'noteart',
        'linknote',
        'typeSection',
        'idsection',
        'fileVid',
        'fileAud',
        'link_video',
        'books',
    ];

    protected function getTitleAttribute(){

        return $this->titleart;
    }
}

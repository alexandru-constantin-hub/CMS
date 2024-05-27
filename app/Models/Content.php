<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    const CONTENT_PAGE = 'page';
    const CONTENT_POST = 'post';
    
    protected $fillable = ['title', 'type'];

    public static $contentTypes = [
        self::CONTENT_PAGE,
        self::CONTENT_POST,
    ];

    public function getStatusNameAttribute()
    {
        return self::$contentTypes[$this->status];
    }

}

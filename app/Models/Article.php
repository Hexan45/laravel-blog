<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $dates = [
        'article_created_at',
        'article_updated_at'
    ];

    protected $table = 'articles';
    protected $primaryKey = 'id';

    public $timestamps = false;

    use HasFactory;
}

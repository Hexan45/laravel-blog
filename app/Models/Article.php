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

    protected $fillable = [
        'title',
        'description',
        'excerpt',
        'image_path',
        'image_alternate',
        'author_id',
        'category_id'
    ];

    protected $attributes = [
        'image_path' => 'images/office.png'
    ];

    public function author() {
        return $this->hasOne(\App\Models\User::class, 'id', 'author_id');
    }

    public function category() {
        return $this->hasOne(\App\Models\Category::class, 'id', 'category_id');
    }

    use HasFactory;
}

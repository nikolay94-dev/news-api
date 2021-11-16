<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'author', 'themes', 'title', 'description', 'url', 'urlToImage', 'content', 'publishedAt', 'source_news_id'
    ];

    public function source()
    {
        return $this->belongsTo(SourceNews::class, 'source_news_id');
    }
}

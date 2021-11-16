<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceNews extends Model
{
    protected $table = 'source_news';

    protected $fillable = [
        'outer_id', 'name'
    ];
}

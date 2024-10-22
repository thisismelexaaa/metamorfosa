<?php

namespace App\Models;

use App\Models\Panel\News;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}

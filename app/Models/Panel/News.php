<?php

namespace App\Models\Panel;

use App\Models\NewsImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(NewsImage::class);
    }
}

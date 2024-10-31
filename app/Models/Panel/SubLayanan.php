<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubLayanan extends Model
{
    use HasFactory;

    protected $table = 'sub_layanan';

    protected $guarded = ['id'];

    public function getLayanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }

    public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class, 'id_layanan', 'id');
    }
}

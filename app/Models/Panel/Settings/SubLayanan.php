<?php

namespace App\Models\Panel\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLayanan extends Model
{
    use HasFactory;

    protected $table = 'sub_layanan';

    protected $guarded = ['id'];

    public function getLayanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }
}

<?php

namespace App\Models\Panel;

use App\Models\Panel\Layanan;
use App\Models\Panel\SubLayanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $guarded = [];

    public function getLayanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan');
    }

    public function getSubLayanan()
    {
        return $this->belongsTo(SubLayanan::class, 'sub_layanan');
    }
}

<?php

namespace App\Models\Panel\Master;

use App\Models\Panel\Settings\Layanan;
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
}

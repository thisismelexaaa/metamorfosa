<?php

namespace App\Models\Panel;

use App\Models\Panel\Customer;
use App\Models\Panel\SubLayanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Layanan extends Model
{
    use HasFactory;

    public $table = 'layanan';

    protected $guarded = [];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'layanan', 'id');
    }

    public function getSubLayanan()
    {
        return $this->hasMany(SubLayanan::class, 'id_layanan', 'id');
    }

    public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class, 'id_layanan', 'id');
    }
}

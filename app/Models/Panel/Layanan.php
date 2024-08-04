<?php

namespace App\Models\Panel;

use App\Models\Panel\Customer;
use App\Models\Panel\SubLayanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

<?php

namespace App\Models\Panel\Settings;

use App\Models\Panel\Master\Customer;
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
}

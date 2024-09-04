<?php

namespace App\Models\Panel;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }

    public function subLayanan()
    {
        return $this->belongsTo(SubLayanan::class, 'id_sub_layanan');
    }

    public function supportTeacher()
    {
        return $this->belongsTo(User::class, 'id_support_teacher');
    }

    public function hasilKonsultasi()
    {
        return $this->hasMany(HasilKonsultasi::class, 'id_konsultasi');
    }
}

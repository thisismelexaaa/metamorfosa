<?php

namespace App\Models\Panel;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKonsultasi extends Model
{
    use HasFactory;

    protected $table = 'hasil_konsultasi';

    protected $guarded = ['id'];

    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class, 'id_konsultasi');
    }

    public function supportTeacher()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

<?php

namespace App\Models\Panel\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public $table = 'staff';

    protected $guarded = [];
}

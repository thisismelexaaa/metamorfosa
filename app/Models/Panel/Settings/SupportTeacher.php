<?php

namespace App\Models\Panel\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTeacher extends Model
{
    use HasFactory;

    public $table = 'support_teacher';

    protected $guarded = [];
}

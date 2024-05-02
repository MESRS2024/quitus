<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRecoder extends Model
{
    use HasFactory;
    public $table = 'job_recoders';

    protected $fillable = [
        'user_id',
        'job_id',
        'job_status'
    ];
}

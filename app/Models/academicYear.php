<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
class academicYear extends Model
{
    use HasFactory;
    public $table = 'academic_years';

    public $fillable = [
        'id',
        'description',
        'is_active'
    ];

    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'is_active' => 'boolean'
    ];

    public static array $rules = [
        'description' => 'required',
        'is_active' => 'required'
    ];


}

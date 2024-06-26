<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Scopes\EtablissementScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;



class User  extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoleAndPermission;
    public $table = 'users';

    public $fillable = [
        'name',
        'name_en',
        'email',
        'email_verified_at',
        'password',
        'progres_token',
        'expired_at',
        'progres_id',
        'uuid',
        'idIndividu',
        'etablissement_id',

    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'expired_at' => 'datetime',
    ];


    public static  $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    public static  $UpdateRules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
    ];




}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'table_users';
    protected $primarykey = 'user_id';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix_name',
        'birth_date',
        'gender_id',
        'address',
        'contact_number',
        'email',
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}

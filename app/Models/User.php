<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable , HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'tblUser';
    protected $fillable = [

        'username',
        'password',
        'roleid',
        'reference_staff_id',
        'status',
        'decription',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
    }


    public function ModelHasPermission()
    {
        return $this->hasMany(ModelHasPermission::class, 'model_id');
    }

    public function staff()
    {

        return $this->belongsTo(Staff::class, 'reference_staff_id');
    }

}

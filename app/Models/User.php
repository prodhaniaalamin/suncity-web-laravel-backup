<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use TwoFactorAuthenticatable;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    // protected $with = ['role'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role_id',
        'remember_token',
        'photo',
        'phone',
        'options',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
        'email_verified_at' => 'datetime',
        'role_id' => 'integer',
        'status' => 'integer',
    ];


    public function setSettings($key, $val)
    {
        $options = $this->options ?: [];
        $options[$key] = $val;
        $this->options = $options;
        return $this->options;
    }

    public function getSettings($key)
    {
        $options = fluent($this->options ?: []);
        return isset($options[$key]) ? $options[$key] : null;
    }

    public function admin()
    {
        return $this->admin = $this->role_id === 2 ? User::find($this->id) : null;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}

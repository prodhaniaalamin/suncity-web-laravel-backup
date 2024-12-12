<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department_id',
        'name',
        'email',
        'phone',
        'address',
        'religion',
        'gender',
        'specialty',
        'qualification',
        'description',
        'photo',
        'options',
        'status',
    ];

    protected $casts = [
        'options' => 'object',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

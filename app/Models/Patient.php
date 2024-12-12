<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'religion',
        'gender',
        'birth',
        'blood',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

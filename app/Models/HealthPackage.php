<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthPackage extends Model
{
    use HasFactory;

    protected $table = 'health_packages';

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'duration',
        'maximum',
        'status',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}

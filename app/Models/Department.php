<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'description',
        'image',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}

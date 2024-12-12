<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'i_no',
        'school_id',
        'name',
        'is_on'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'i_no' => 'integer',
        'school_id' => 'integer',
        'is_on' => 'integer',
    ];
}

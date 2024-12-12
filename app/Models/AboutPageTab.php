<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageTab extends Model
{
    use HasFactory;

    protected $table = 'about_page_tabs';

    protected $fillable = [
        'name',
        'title',
        'description',
        'status',
    ];
}

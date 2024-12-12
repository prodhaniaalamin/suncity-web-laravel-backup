<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by','key','value','options','status'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    //==============***============//
    public function setSetting($key, $value, $needSave = true) {
        $options = $this->options ?? [];
        $options[$key] = $value;
        $this->options = $options;
        $needSave && $this->save();
        return $options;
    }

    public function getSetting($key, $needBoolean = false)
    {
        $options = $this->options ?? [];
        return $options[$key] ?? ($needBoolean ? null : '');
    }
    public function jsonStrToArray($key, $needBoolean = false)
    {
        $options = json_decode($this->value ?? '', true) ?? [];
        return $options[$key] ?? ($needBoolean ? null : '');
    }
}

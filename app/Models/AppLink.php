<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppLink extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'route',
        'parent_id',
        'type',
        'icon',
        'status'
    ];

    protected $appends = [
        'link'
    ];

    public function getLinkAttribute() {
        if($this->route && !empty($this->route)) {
            $actionMethod = substr($this->route, strrpos($this->route, '.')+1, strlen($this->route));
            return in_array($actionMethod, ['edit', 'show', 'update', 'destroy']) ? route($this->route, 1):route($this->route);
        }
        return null;
    }

    /**
     * Get all the comments for the AppLink
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function child()
    {
        return $this->hasOne(AppLink::class, 'parent_id', 'id');
    }

    /**
     * Get all the comments for the AppLink
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(AppLink::class, 'parent_id', 'id');
    }
}

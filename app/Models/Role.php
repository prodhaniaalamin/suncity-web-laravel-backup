<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    private $publicAccessAbleColumns = ['name', 'prefix', 'id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'prefix',
        'access',
        'routes',
        'status'
    ];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'permissions',
        'roleRoutes'
    ];

    public function getPermissionsAttribute()
    {
        return $this->access ? toIntval(explode(',', $this->access)) : [];
    }

    public function getRoleRoutesAttribute()
    {
        return empty($this->routes) ? [] : toIntval(explode(',', $this->routes));
    }

    public function columns(array $columns = [])
    {
        if (!Auth::check()) return [];

        $data = [];
        foreach ($columns as $columnName) {
            if (in_array($columnName, $this->publicAccessAbleColumns)) {
                $data[$columnName] = $this->{$columnName};
            }
        }
        return $data;
    }
}

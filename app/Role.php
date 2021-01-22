<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Role extends Model
{
    protected $fillable = [
        'name',
        'description',
        'guard_name'
    ];
}

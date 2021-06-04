<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAccess extends Model
{
    use HasFactory;

    protected $fillable = ['system_access_id','role_id'];
    protected $guarded  = ['id'];

    public function system_access()
    {
        return $this->belongsTo(SystemAccess::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['system_id','role','description'];
    protected $guarded  = ['id'];

    public function system()
    {
        return $this->belongsTo(System::class);
    }

    public function role_access()
    {
        return $this->hasMany(RoleAccess::class);
    }
}

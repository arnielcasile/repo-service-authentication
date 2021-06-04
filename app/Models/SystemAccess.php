<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemAccess extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','emp_id','system_id','status'];
    protected $guarded  = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function system()
    {
        return $this->belongsTo(System::class);
    }

    public function role_access()
    {
        return $this->hasMany(RoleAccess::class);
    }

}

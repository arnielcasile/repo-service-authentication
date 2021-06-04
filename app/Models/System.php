<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected $fillable = ['abbreviation','name','reference_code',
                            'reference_number','description','date_inserted','date_updated','status','section_owner'
                        ];
    protected $guarded  = ['id'];


    public function system_access()
    {
        return $this->hasMany(SystemAccess::class);
    }

    public function role()
    {
        return $this->hasMany(Role::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressProject extends Model
{
    
    protected $table = 'address_project';
    protected $fillable = ['id', 'address', 'latitude', 'longtitude', 'project_id'];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

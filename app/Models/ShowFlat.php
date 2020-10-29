<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowFlat extends Model
{
    //
    protected $table = 'show_flat';
    protected $fillable = ['title', 'project_id'];
    public function project(){
        return $this->belongTo(Project::class);
    }
}

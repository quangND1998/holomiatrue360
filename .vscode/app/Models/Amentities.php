<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amentities extends Model
{
    //

    protected $table = 'amentities';
    protected $fillable = ['title', 'folder_image','project_id'];
    public function project(){
  
       
        return $this->belongsTo(Project::class);


    }
}
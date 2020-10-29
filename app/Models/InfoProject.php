<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoProject extends Model
{
    protected $table ='info_project';


    protected $fillable = [
       'id','title', 'project_id', 'logo', 'thumbnail', 'phone', 'link_register','link_film' ,'link_website'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}

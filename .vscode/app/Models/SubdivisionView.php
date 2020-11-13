<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubdivisionView extends Model
{


    protected $table = 'subdivision_view';

    protected $fillable = ['title', 'project_id'];
    public function project(){
        return $this->belongsTo(Project::class);

    }

    public function ground(){
        return $this->hasMany(Ground::class,'subdivision_id');
    }

    public function model_ar(){
        return $this->hasOne(ModelAR::class,'subdivision_id');

    }

}

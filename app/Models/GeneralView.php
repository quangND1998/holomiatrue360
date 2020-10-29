<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralView extends Model
{

    protected $table = 'general_view';
    protected $fillable = ['id','folder_ing_day', 'folder_present_image','folder_img_night','project_id'];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function model_ar(){
            return $this->hasOne(ModelAR::class,'view_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAR extends Model
{   
    protected $table = 'model_ar';
    protected $fillable = ['id', 'model_glb', 'model_usdz', 'view_id','subdivision_id'];
        public function general(){
            return $this->belongTo(GeneralView::class);
        }
        public function subdivision(){
            return $this->belongTo(SubdivisionView::class);
        }
}

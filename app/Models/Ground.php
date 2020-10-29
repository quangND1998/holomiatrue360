<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    protected $table = 'ground';
    protected $fillable = ['title', 'subdivision_id','image'];

    public function subdivision(){
        return $this->belongTo(SubdivisionView::class);
    }
}

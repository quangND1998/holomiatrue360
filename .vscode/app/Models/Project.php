<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Project extends Model
{
    //

    protected $table = 'project';

    //protected $fillable = ['title'];
    public function address(){
        return $this->hasOne(AddressProject::class,'project_id');
    }

    public function info(){
        return $this->hasOne(InfoProject::class,'project_id');
    }
    public function general(){
        return $this->hasOne(GeneralView::class,'project_id');
    }
    public function map(){
        return $this->hasOne(Map::class,'project_id');
    }
    public function subdivision()
    {
        return $this->hasMany(SubdivisionView::class,'project_id');
    }
    public function showflat()
    {
        return $this->hasMany(showflat::class,'project_id');
    }

    public function  amentities(){
        return $this->hasMany(Amentities::class,'project_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
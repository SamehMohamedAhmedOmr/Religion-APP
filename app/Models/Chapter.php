<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use SoftDeletes;
    protected $table = 'chapters';
    protected $fillable = [
        'name' , 'branch_id'
    ];

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function sections(){
        return $this->hasMany(Section::class,'chapter_id','id');
    }

}

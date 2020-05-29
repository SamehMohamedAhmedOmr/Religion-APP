<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use SoftDeletes;
    protected $table = 'chapters';
    protected $fillable = [
        'name' , 'branch_id' , 'created_by' , 'updated_by'
    ];

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function sections(){
        return $this->hasMany(Section::class,'chapter_id','id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }

}

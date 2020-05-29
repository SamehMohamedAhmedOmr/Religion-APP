<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{

    use SoftDeletes;
    protected $table = 'sections';
    protected $fillable = [
        'name' , 'chapter_id' , 'created_by' , 'updated_by'
    ];

    public function chapter(){
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }


    public function questions(){
        return $this->hasMany(Question::class,'section_id','id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }

}

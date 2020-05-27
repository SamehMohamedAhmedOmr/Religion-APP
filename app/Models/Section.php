<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{

    use SoftDeletes;
    protected $table = 'sections';
    protected $fillable = [
        'name' , 'chapter_id'
    ];

    public function chapter(){
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }


    public function questions(){
        return $this->hasMany(Question::class,'section_id','id');
    }

}

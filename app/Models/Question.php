<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    protected $table = 'questions';
    protected $fillable = [
        'title', 'question', 'answer' , 'section_id', 'branch_id' , 'chapter_id'
        , 'created_by' , 'updated_by'
    ];

    public function section(){
        return $this->belongsTo(Section::class,'section_id','id');
    }

    public function chapter(){
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function keywords(){
        return $this->belongsToMany(Keyword::class,'questions_keywords','question_id','keyword_id')
            ->using(QuestionKeyword::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }
}

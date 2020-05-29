<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $id)
 */
class Keyword extends Model
{
    use SoftDeletes;
    protected $table = 'keywords';
    protected $fillable = [
        'name' , 'created_by' , 'updated_by'
    ];

    public function Questions(){
        return $this->belongsToMany(Question::class,'questions_keywords','keyword_id','question_id')
            ->using(QuestionKeyword::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }

}

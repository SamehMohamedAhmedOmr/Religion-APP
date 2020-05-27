<?php

namespace App\Models;

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
        'name'
    ];

    public function Questions(){
        return $this->belongsToMany(Question::class,'questions_keywords','keyword_id','question_id')
            ->using(QuestionKeyword::class);
    }
}

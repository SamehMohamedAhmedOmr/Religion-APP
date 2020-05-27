<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $id)
 */
class QuestionKeyword extends Pivot
{
    protected $table = 'questions_keywords';
    protected $fillable = [
        'keyword_id', 'question_id'
    ];

}

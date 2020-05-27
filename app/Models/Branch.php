<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;
    protected $table = 'branches';
    protected $fillable = [
        'name'
    ];

    public function chapters(){
        return $this->hasMany(Chapter::class,'branch_id','id');
    }
}

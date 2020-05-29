<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $id)
 */
class Branch extends Model
{
    use SoftDeletes;
    protected $table = 'branches';
    protected $fillable = [
        'name' , 'created_by' , 'updated_by'
    ];

    public function chapters(){
        return $this->hasMany(Chapter::class,'branch_id','id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }

}

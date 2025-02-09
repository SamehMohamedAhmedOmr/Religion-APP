<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    protected $table = "analysis";
    protected $fillable = [
        'id',
        'table_name',
        'count', 
        'read',
        'write',
        'join',
        'sql'
    ];
}

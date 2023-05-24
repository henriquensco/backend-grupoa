<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'title',
        'description',
        'created_at',
        'updated_at',
        'finished_at'
    ];

}

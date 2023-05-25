<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tasks';

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'title',
        'description',
        'finished',
        'created_at',
        'updated_at',
        'finished_at'
    ];

}

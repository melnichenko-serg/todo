<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['text', 'endDay', 'is_complete'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

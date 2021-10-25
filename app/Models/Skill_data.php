<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill_data extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'skills_id',
        'value', 
    ];
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}

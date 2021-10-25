<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title', 
    ];

    public function skilldata() {
        return $this->hasMany(Skill_data::class);
    }

}

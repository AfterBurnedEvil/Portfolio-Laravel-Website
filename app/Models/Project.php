<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Project extends Model
{
    protected $fillable = [
        'userid',
        'img',
        'title', 
        'body',
    ];

    public function save(array $options = array())
    {
        if( ! $this->userid)
        {
            $this->userid = Auth::user()->id;
        }

        parent::save($options);
    }

    use HasFactory;
}

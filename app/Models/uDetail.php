<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class uDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'dob',
        'hometown',
        'email',
        'mybio',
    ];

    public function save(array $options = array())
    {
        if( ! $this->user_id)
        {
            $this->user_id = Auth::user()->id;
        }

        parent::save($options);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

}


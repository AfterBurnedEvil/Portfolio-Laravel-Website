<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'message',
        'email',

    ];

    public function save(array $options = array())
    {
        if( ! $this->ipaddress)
        {
            $this->ipaddress = Request::getClientIp();
        }

        parent::save($options);
    }

}

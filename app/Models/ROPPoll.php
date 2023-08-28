<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ROPPoll extends Model
{
    use HasFactory;

    protected $table = 'rop_poll';

    protected $fillable = [
        'member_id'
    ];

}

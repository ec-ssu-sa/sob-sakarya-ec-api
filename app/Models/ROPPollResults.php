<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ROPPollResults extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;

    protected $table = 'rop_poll_results';

    protected $fillable = [
        'is_agree'
    ];
}

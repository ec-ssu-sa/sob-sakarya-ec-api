<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GAGroupPollResults extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;

    protected $table = 'ga_a_group_poll_results';

    protected $fillable = [
        'is_agree',
    ];
}

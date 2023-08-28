<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\ECAGroup;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class GAGroupPoll extends Model
{
    use HasFactory;

    protected $table = 'ga_a_group_poll';

    protected $fillable = [
        'member_id',
        'verifying_code',
        'is_voted',
    ];

    public function member()
    {
        return Http::acceptJson()->post(env('SOB_API') . '/api/members/check', [
            'token' => env('REQ_TOKEN'),
            'member_id' => $this->member_id,
        ]);
    }

    public function setVerifiyngCode()
    {
        $code = Str::random(6);
        $this->verifying_code = $code;
        $this->save();
        return $code;
    }

    public function sendEmail()
    {
        $member = $this->member;
        Mail::mailer('ec_sob')->to($member->email)->send(new ECAGroup($member, $this->setVerifiyngCode()));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GAGroupPoll;
use App\Models\GAGroupPollResults;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ECGAGroupPollController extends Controller
{
    public function check_member_eligibility(Request $request)
    {
        try {
            $currentDate = Carbon::now();
            $startDate = Carbon::create(2023, 8, 28, 21, 0, 0);
            $endDate = Carbon::create(2023, 8, 29, 0, 0, 0);
            if (!$currentDate->between($startDate, $endDate)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'out-of-date',
                ]);
            }
            $member = Http::acceptJson()->post(env('SOB_API') . '/api/members/check', [
                'token' => env('REQ_TOKEN'),
                'number' => $request->membership_number,
                'email' => $request->email
            ]);
            $poll = GAGroupPoll::where('member_id', $member->id)->first();
            if (!$poll) {
                $poll = GAGroupPoll::create([
                    'member_id' => $member->id,
                ]);
                $poll->sendEmail();
                return response()->json([
                    'status' => 'success',
                    'message' => 'member-is-eligible',
                ]);
            } else {
                if ($poll->is_voted) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'member-is-already-checked',
                    ]);
                }
                $poll->sendEmail();
                return response()->json([
                    'status' => 'success',
                    'message' => 'member-is-eligible',
                ]);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'member-is-already-checked',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'member-is-not-eligible',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function vote(Request $request)
    {
        try {
            $currentDate = Carbon::now();
            $startDate = Carbon::create(2023, 8, 28, 21, 0, 0);
            $endDate = Carbon::create(2023, 8, 29, 0, 0, 0);
            if (!$currentDate->between($startDate, $endDate)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'out-of-date',
                ]);
            }
            $poll = GAGroupPoll::where('member_id', $request->member_id)->where('verifying_code', $request->verification_code)->where('is_voted', false)->firstOrFail();
            $pollResult = GAGroupPollResults::create([
                'is_agree' => $request->is_agree,
            ]);
            $poll->is_voted = true;
            $poll->save();
            return response()->json([
                'status' => 'success',
                'message' => 'voted-successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'member-is-not-eligible',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function results()
    {
        $agree = GAGroupPollResults::where('is_agree', true)->count();
        $disagree = GAGroupPollResults::where('is_agree', false)->count();
        return response()->json([
            'agree' => $agree,
            'disagree' => $disagree,
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ROPPollResults;
use App\Models\ROPPoll;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ROPController extends Controller
{

    public function check_member_eligibility(Request $request)
    {
        try {
            $currentDate = Carbon::now();
            $startDate = Carbon::create(2023, 8, 21, 12, 0, 0);
            $endDate = Carbon::create(2023, 8, 21, 23, 59, 59);
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
            if (!ROPPoll::where('member_id', $member->id)->first()) {
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
            $startDate = Carbon::create(2023, 8, 21, 12, 0, 0);
            $endDate = Carbon::create(2023, 8, 21, 23, 59, 59);
            if (!$currentDate->between($startDate, $endDate)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'out-of-date',
                ]);
            }
            $result = ROPPollResults::create([
                'is_agree' => $request->is_agree,
            ]);
            $poll = ROPPoll::create([
                'member_id' => $request->member_id,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'voted-successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'error-occured',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function results()
    {
        $agree = ROPPollResults::where('is_agree', true)->count();
        $disagree = ROPPollResults::where('is_agree', false)->count();
        return response()->json([
            'agree' => $agree,
            'disagree' => $disagree,
        ], 200);
    }
}

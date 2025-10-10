<?php

namespace App\Http\Controllers;

use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VisitorLogController extends Controller
{
    public function logVisit(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $today = Carbon::today()->toDateString();
        $visitorLog = VisitorLog::firstOrCreate(
            ['user_id' => $user->id, 'visit_date' => $today],
            ['visit_count' => 0]
        );
        $visitorLog->increment('visit_count');

        return response()->json(['success' => true]);
    }
}
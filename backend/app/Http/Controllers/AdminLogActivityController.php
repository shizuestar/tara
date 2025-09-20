<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminLogActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ActivityLog::query();

        if ($request->has('user_id') && $request->user_id != '') {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('start_date') && $request->start_date != '') {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date != '') {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->has('keyword') && $request->keyword != '') {
            $query->where('description', 'like', '%' . $request->keyword . '%');
        }

        $logs = $query->latest()->paginate(10);

        $users = User::all();

        return view('administrator.admin.log_activity.index', compact('logs', 'users'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = \App\Models\Activity::latest()->get();

        $totalActivities = \App\Models\Activity::count();

        $totalUpdates = \App\Models\ActivityUpdate::count();

        $doneUpdates = \App\Models\ActivityUpdate::where('status', 'done')->count();

        $pendingUpdates = \App\Models\ActivityUpdate::where('status', '!=', 'done')->count();

        return view('activities.index', compact(
            'activities',
            'totalActivities',
            'totalUpdates',
            'doneUpdates',
            'pendingUpdates'
        ));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store()
    {
        \App\Models\Activity::create([
            'title' => request('title'),
            'description' => request('description'),
            'status' => 'active',
        ]);

        return redirect('/activities');
    }

    public function addUpdate(int $id)
    {
        $activity = \App\Models\Activity::findOrFail($id);

        return view('activities.update', compact('activity'));
    }

    public function saveUpdate(int $id)
    {
        $activity = \App\Models\Activity::findOrFail($id);

        $activity->updates()->create([
            'status' => request('status'),
            'remark' => request('remark'),
            'updated_by' => Auth::id(),
        ]);

        return redirect('/activities');
    }

    public function todayLog()
    {
        $updates = \App\Models\ActivityUpdate::with(['activity', 'user'])
            ->whereDate('created_at', today())
            ->latest()
            ->get();

        return view('activities.today', compact('updates'));
    }
    
    public function report()
    {
        $from = request('from');
        $to = request('to');

        $query = \App\Models\ActivityUpdate::with(['activity', 'user']);

        if ($from && $to) {
            $query->whereBetween('created_at', [$from, $to]);
        }

        $updates = $query->latest()->get();

        return view('activities.report', compact('updates', 'from', 'to'));
    }
}
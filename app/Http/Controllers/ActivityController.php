<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = \App\Models\Activity::latest()->get();

        return view('activities.index', compact('activities'));
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
        ]);

        return redirect('/activities');
    }
}
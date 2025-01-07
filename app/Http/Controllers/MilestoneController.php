<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Grant;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $milestones = Milestone::all();
        return view('milestones.index', compact('milestones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grants = Grant::all();
        return view('milestones.create', compact('grants'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'milestone_name' => 'required',
            'grant_id' => 'required',
            'target_completion_date' => 'required',
            'status' => 'required',
            'deliverable' => 'required',
            'remarks' => 'nullable',
            'date_updated' => 'nullable',
        ]);

        Milestone::create($request->all());
        return redirect()->route('milestones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        return view('milestones.show', compact('milestone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $milestone = Milestone::findOrFail($id);
    $grants = Grant::all();  // Fetch all grants
    return view('milestones.edit', compact('milestone', 'grants'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        $request->validate([
            'milestone_name' => 'required',
            'target_completion_date' => 'required',
            'status' => 'required',
            'deliverable' => 'required',
            'remarks' => 'required',
            'date_updated' => 'nullable',
        ]);

        $milestone->update($request->all());
        return redirect()->route('milestones.index');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        $milestone->delete();
        return redirect()->route('milestones.index');
    }
}
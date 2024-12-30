<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\Academician;
use Illuminate\Http\Request;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Eager load the 'academicians' relationship
    $grants = Grant::with('academicians')->get();
    return view('grants.index', compact('grants'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all academicians and pass them to the 'grants.create' view
        $academicians = Academician::all();
        return view('grants.create', compact('academicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required',
        'grant_amount' => 'required',
        'grant_provider' => 'required',
        'start_date' => 'required',
        'duration_months' => 'required',
        'project_leader_id' => 'required|exists:academicians,id', // Make sure project leader exists
        'members' => 'nullable|array', // Validate members as an array
        'members.*' => 'exists:academicians,id', // Ensure all selected members are valid academicians
    ]);

    // Create the Grant record
    $grant = Grant::create($request->except('members')); // Store grant without members initially

    // Attach the project leader to the grant
    $grant->academicians()->attach($request->project_leader_id, ['role' => 'Project Leader']); // Store role as 'Project Leader'

    // Attach the selected members to the grant
    if ($request->has('members')) {
        foreach ($request->members as $memberId) {
            $grant->academicians()->attach($memberId, ['role' => 'Member']); // Store role as 'Member'
        }
    }

    // Redirect to the grants index page
    return redirect()->route('grants.index');
}


    /**
     * Display the specified resource.
     */
    public function show(Grant $grant)
    {
        // Show the details of a single grant
        return view('grants.show', compact('grant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        // Fetch all academicians and pass the grant to the edit view
        $academicians = Academician::all();
        return view('grants.edit', compact('academicians', 'grant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grant $grant)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required',
            'grant_amount' => 'required',
            'grant_provider' => 'required',
            'start_date' => 'required',
            'duration_months' => 'required',
        ]);

        // Update the grant record with the new data
        $grant->update($request->all());

        // Redirect to the grants index page
        return redirect()->route('grants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        // Delete the grant record
        $grant->delete();

        // Redirect to the grants index page
        return redirect()->route('grants.index');
    }
}
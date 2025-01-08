<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\Academician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->can('viewAllGrants')) {
            // Admins and staff can view all grants
            $grants = Grant::with('academicians')->get();
        } else {
            // Academicians can only view grants they are associated with
            $grants = Grant::whereHas('academicians', function ($query) use ($user) {
                $query->where('academician_id', $user->academician->id);
            })->with('academicians')->get();
        }

        return view('grants.index', compact('grants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academicians = Academician::all();
        return view('grants.create', compact('academicians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'grant_amount' => 'required',
            'grant_provider' => 'required',
            'start_date' => 'required',
            'duration_months' => 'required',
            'description' => 'nullable|string',
            'project_leader_id' => 'required|exists:academicians,id',
            'members' => 'nullable|array',
            'members.*' => 'exists:academicians,id',
        ]);

        // Create the grant record including `project_leader_id`
        $grant = Grant::create($request->only(
            'title',
            'grant_amount',
            'grant_provider',
            'start_date',
            'duration_months',
            'description',
            'project_leader_id'
        ));

        // Attach the project leader
        $grant->academicians()->attach($request->project_leader_id, ['role' => 'Project Leader']);

        // Attach members if provided
        if ($request->has('members')) {
            $members = array_diff($request->members, [$request->project_leader_id]);
            foreach ($members as $memberId) {
                $grant->academicians()->attach($memberId, ['role' => 'Member']);
            }
        }

        return redirect()->route('grants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grant $grant)
    {
        return view('grants.show', compact('grant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        $academicians = Academician::all();
        return view('grants.edit', compact('academicians', 'grant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grant $grant)
    {
        $request->validate([
            'title' => 'required',
            'grant_amount' => 'required',
            'grant_provider' => 'required',
            'start_date' => 'required',
            'duration_months' => 'required',
            'description' => 'nullable|string',
            'project_leader_id' => 'required|exists:academicians,id',
            'members' => 'nullable|array',
            'members.*' => 'exists:academicians,id',
        ]);

        $grant->update($request->except('members', 'project_leader_id'));

        // Sync relationships
        $grant->academicians()->detach();
        $grant->academicians()->attach($request->project_leader_id, ['role' => 'Project Leader']);

        if ($request->has('members')) {
            $members = array_diff($request->members, [$request->project_leader_id]);
            foreach ($members as $memberId) {
                $grant->academicians()->attach($memberId, ['role' => 'Member']);
            }
        }

        return redirect()->route('grants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        $grant->delete();
        return redirect()->route('grants.index');
    }
}
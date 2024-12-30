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
        $grants = Grant::all();
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
        ]);

        Grant::create($request->all());
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
        return view('grants.edit', compact('academicians','grant'));
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
        ]);

        $grant->update($request->all());
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
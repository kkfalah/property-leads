<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\LeadActivity;
use Illuminate\Http\Request;

class LeadActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Lead $lead)
    {
        
        $validated = $request->validate([
            'type' => 'required',
            'description' => 'required|string'
        ]);

        

        $lead->activities()->create($validated);


        return redirect()->route('leads.show', $lead)
            ->with('success', 'Activity added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LeadActivity $leadActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeadActivity $leadActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeadActivity $leadActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadActivity $leadActivity)
    {
        //
    }
}

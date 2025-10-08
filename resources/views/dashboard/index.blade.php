@extends('layouts.app')

@section('title', 'Dashboard - Property Leads')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">Dashboard</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="mt-3">{{ $totalLeads }}</h2>
                <p class="text-muted mb-0">Total Leads</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="mt-3">{{ $totalActivities }}</h2>
                <p class="text-muted mb-0">Total Activities</p>
            </div>
        </div>
    </div>
</div>


@endsection
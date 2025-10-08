@extends('layouts.app')

@section('title', 'Leads - Property Leads')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Leads</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('leads.create') }}" class="btn btn-primary">
                Add New Lead
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('leads.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Filter by Status</label>
                    <select name="status" class="form-select">
                        <option value="">All Statuses</option>
                        <option value="New" {{ request('status') == 'New' ? 'selected' : '' }}>New</option>
                        <option value="Contacted" {{ request('status') == 'Contacted' ? 'selected' : '' }}>Contacted
                        </option>
                        <option value="Closed" {{ request('status') == 'Closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Filter by Source</label>
                    <select name="source" class="form-select">
                        <option value="">All Sources</option>
                        <option value="Bayut" {{ request('source') == 'Bayut' ? 'selected' : '' }}>Bayut</option>
                        <option value="Property Finder" {{ request('source') == 'Property Finder' ? 'selected' : '' }}>
                            Property Finder</option>
                        <option value="Dubizzle" {{ request('source') == 'Dubizzle' ? 'selected' : '' }}>Dubizzle</option>
                        <option value="Website" {{ request('source') == 'Website' ? 'selected' : '' }}>Website</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">&nbsp;</label>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Filter
                        </button>
                        <a href="{{ route('leads.index') }}" class="btn btn-secondary">
                            Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($leads->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Source</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leads as $lead)
                                <tr>
                                    <td>{{ $lead->name }}</td>
                                    <td>{{ $lead->email }}</td>
                                    <td>{{ $lead->phone }}</td>
                                    <td>{{ $lead->source }}</td>
                                    <td>
                                        @if ($lead->status == 'New')
                                            <span class="badge bg-primary">New</span>
                                        @elseif($lead->status == 'Contacted')
                                            <span class="badge bg-warning">Contacted</span>
                                        @else
                                            <span class="badge bg-success">Closed</span>
                                        @endif
                                    </td>
                                    <td>{{ $lead->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('leads.show', $lead) }}" class="btn btn-sm btn-info"
                                            title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('leads.edit', $lead) }}" class="btn btn-sm btn-warning"
                                            title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('leads.destroy', $lead) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this lead?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $leads->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted mt-3">No leads found</p>
                    <a href="{{ route('leads.create') }}" class="btn btn-primary">Add Lead</a>
                </div>
            @endif
        </div>
    </div>
@endsection

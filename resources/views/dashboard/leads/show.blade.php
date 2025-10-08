@extends('layouts.app')
@section('title','Lead Details')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>{{ $lead->name }}</h3>
        <p><strong>Email:</strong> {{ $lead->email }}</p>
        <p><strong>Phone:</strong> {{ $lead->phone }}</p>
        <p><strong>Source:</strong> {{ $lead->source }}</p>
        <p><strong>Status:</strong> {{ $lead->status }}</p>

        <a href="{{ route('leads.edit', $lead) }}" class="btn btn-sm btn-warning">Edit</a>
        <a href="{{ route('leads.index') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
<div class="row">
    

    <div class="col-md-6 my-5">
        <h5>Activities</h5>
        @if($lead->activities->isEmpty())
            <p class="text-muted">No activities yet.</p>
        @else
            <ul class="list-group mb-3">
                @foreach($lead->activities()->latest()->get() as $act)
                    <li class="list-group-item">
                        <strong>{{ $act->type }}</strong> —
                        <small class="text-muted">{{ $act->created_at->format('d-m-Y H:i a') }}</small>
                        <div>{{ $act->description }}</div>
                    </li>
                @endforeach
            </ul>
        @endif

        <h6>Add Activity</h6>
        <form action="{{ route('leads.activities.store', $lead) }}" method="POST">
            @csrf
            <div class="mb-2">
                <select name="type" class="form-select" required>
                    <option value="">-- Type --</option>
                    <option value="Note">Note</option>
                    <option value="Viewing">Viewing</option>
                    <option value="Meeting">Meeting</option>
                </select>
            </div>
            <div class="mb-2">
                <textarea name="description" class="form-control" rows="3" placeholder="Add details" required></textarea>
            </div>
            <button class="btn btn-sm btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection

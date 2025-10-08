@extends('layouts.app')

@section('title', 'Edit Lead - Property Leads')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Edit Lead</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('leads.update', $lead) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $lead->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email', $lead->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                               id="phone" name="phone" value="{{ old('phone', $lead->phone) }}" required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="source" class="form-label">Source <span class="text-danger">*</span></label>
                        <select class="form-select @error('source') is-invalid @enderror" 
                                id="source" name="source" required>
                            <option value="">Select Source</option>
                            <option value="Bayut" {{ old('source', $lead->source) == 'Bayut' ? 'selected' : '' }}>Bayut</option>
                            <option value="Property Finder" {{ old('source', $lead->source) == 'Property Finder' ? 'selected' : '' }}>Property Finder</option>
                            <option value="Dubizzle" {{ old('source', $lead->source) == 'Dubizzle' ? 'selected' : '' }}>Dubizzle</option>
                            <option value="Website" {{ old('source', $lead->source) == 'Website' ? 'selected' : '' }}>Website</option>
                        </select>
                        @error('source')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" name="status" required>
                            <option value="New" {{ old('status', $lead->status) == 'New' ? 'selected' : '' }}>New</option>
                            <option value="Contacted" {{ old('status', $lead->status) == 'Contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="Closed" {{ old('status', $lead->status) == 'Closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('leads.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update Lead
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
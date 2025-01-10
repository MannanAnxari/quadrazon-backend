@extends('adminlte::page')

@section('title', 'Create Category')

@section('content_header')
    <h1>Create Category</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="context">Context</label>
                    <select class="form-control @error('context') is-invalid @enderror" 
                            id="context" 
                            name="context" 
                            required>
                        <option value="">Select Context</option>
                        <option value="blog" {{ old('context') == 'blog' ? 'selected' : '' }}>Blog</option>
                        <option value="portfolio" {{ old('context') == 'portfolio' ? 'selected' : '' }}>Portfolio</option>
                        <option value="case_study" {{ old('context') == 'case_study' ? 'selected' : '' }}>Case Study</option>
                    </select>
                    @error('context')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
@stop
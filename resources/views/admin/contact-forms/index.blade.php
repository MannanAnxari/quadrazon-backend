@extends('adminlte::page')

@section('title', 'Contact Form Submissions')

@section('content_header')
    <h1>Contact Form Submissions</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Source</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactForms as $contactForm)
                        <tr>
                            <td>{{ $contactForm->id }}</td>
                            <td>{{ $contactForm->name }}</td>
                            <td>{{ $contactForm->email }}</td>
                            <td>{{ ucfirst($contactForm->source) }}</td>
                            <td>{{ $contactForm->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.contact-forms.show', $contactForm) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.contact-forms.destroy', $contactForm) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $contactForms->links() }}
            </div>
        </div>
    </div>
@stop

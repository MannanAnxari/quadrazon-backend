@extends('adminlte::page')

@section('title', 'View Contact Form Submission')

@section('content_header')
    <h1>View Contact Form Submission</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9">{{ $contactForm->name }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $contactForm->email }}</dd>

                <dt class="col-sm-3">Message</dt>
                <dd class="col-sm-9">{{ $contactForm->message }}</dd>

                <dt class="col-sm-3">Submitted At</dt>
                <dd class="col-sm-9">{{ $contactForm->created_at->format('Y-m-d H:i:s') }}</dd>
            </dl>

            <a href="{{ route('admin.contact-forms.index') }}" class="btn btn-default">Back to List</a>
            <form action="{{ route('admin.contact-forms.destroy', $contactForm) }}" 
                  method="POST" 
                  style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="btn btn-danger" 
                        onclick="return confirm('Are you sure?')">
                    Delete
                </button>
            </form>
        </div>
    </div>
@stop
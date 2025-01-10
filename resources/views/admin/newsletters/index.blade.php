@extends('adminlte::page')

@section('title', 'Newsletter Subscriptions')

@section('content_header')
    <h1>Newsletter Subscriptions</h1>
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
                        <th>Email</th>
                        <th>Subscribed At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newsletters as $newsletter)
                        <tr>
                            <td>{{ $newsletter->id }}</td>
                            <td>{{ $newsletter->email }}</td>
                            <td>{{ $newsletter->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.newsletters.destroy', $newsletter) }}" method="POST"
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
                {{ $newsletters->links() }}
            </div>
        </div>
    </div>
@stop

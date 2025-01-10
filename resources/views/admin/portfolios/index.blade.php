@extends('adminlte::page')

@section('title', 'Portfolios')

@section('content_header')
    <h1>Portfolios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Portfolio List</h3>
            <div class="card-tools">
                <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Portfolio Item
                </a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{ $portfolio->id }}</td>
                            <td>{{ $portfolio->title }}</td>
                            <td>{{ $portfolio->category->name }}</td>
                            <td>{{ $portfolio->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.portfolios.edit', $portfolio) }}" 
                                   class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" 
                                      method="POST" 
                                      style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger" 
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
                {{ $portfolios->links() }}
            </div>
        </div>
    </div>
@stop
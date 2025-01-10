@extends('adminlte::page')

@section('title', 'Meta Settings')

@section('content_header')
    <h1>Meta Settings</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Meta Settings List</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Route</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($metaSettings as $metaSetting)
                        <tr>
                            <td>{{ $metaSetting->id }}</td>
                            <td>{{ $metaSetting->title }}</td>
                            <td>{{ $metaSetting->meta_description }}</td>
                            <td>{{ $metaSetting->route }}</td>
                            <td>
                                <a href="{{ route('admin.seo-metas.edit', $metaSetting->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Edit Meta Setting')

@section('content_header')
    <h1>Edit Meta Setting</h1>
@stop

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.seo-metas.update', $metaSetting->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Page Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $metaSetting->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                        value="{{ old('meta_title', $metaSetting->meta_title) }}">
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description">{{ old('meta_description', $metaSetting->meta_description) }}</textarea>
                </div>

                <div class="form-group">
                    {{-- @dd($metaSetting->meta_keywords)) --}}
                    <label for="meta_keywords">Meta Keywords</label>
                    <select class="form-control selecst2" name="meta_keywords[]" id="meta_keywords" multiple
                        style="width: 100%;">
                        @if (count(explode(', ', $metaSetting->meta_keywords)))
                            @foreach (old('meta_keywords', explode(', ', $metaSetting->meta_keywords) ?? '[]') as $keyword)
                                @if ($keyword)
                                    <option value="{{ $keyword }}" selected>{{ $keyword }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="route">Route</label>
                    <input type="text" class="form-control" readonly id="route" name="route"
                        value="{{ old('route', $metaSetting->route) }}">
                </div>

                <div class="form-group d-none">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description', $metaSetting->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Meta Setting</button>
                <a href="{{ route('admin.seo-metas.index') }}" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Initialize Select2 on the keywords input field
            $('#meta_keywords').select2({
                tags: true, // Allow tagging new keywords
                tokenSeparators: [',', ' '],
            });
        });
    </script>
@stop

@extends('layouts.auth')

@section('title', 'Create Post | Admin Dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/auth/css/multi-dropdown.css') }}">

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Add New Blog</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}"
                                class="form-control" autocomplete="off" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                                placeholder="Description">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="" disabled selected>Choose option</option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="" disabled selected>Choose option</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tags[]" class="form-control selectpicker" multiple data-live-search="true">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label>File</label>
                            <input type="file" id="title" name="file" value="{{ old('file') }}"
                                class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/auth/js/multi-dropdown.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
            })
            .catch(error => {
                console.error(error);
            });
    </script>




@endsection

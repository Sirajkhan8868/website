@extends('layouts.auth')

@section('title', 'Edit Post | Admin Dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/auth/css/multi-dropdown.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Page</h2>
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

                    <form method="post" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}"
                                class="form-control" autocomplete="off" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="description">{{ old('description', $post->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Is Publish</label>
                            <select name="status" class="form-control">
                                <option value="" disabled selected>Choose option</option>
                                <option @selected(old('status', $post->status) == 1) value="1">Publish</option>
                                <option @selected(old('status', $post->status) == 0) value="0">Games</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="" disabled selected>Choose option</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option selected value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tag</label>
                            <select name="tags[]" class="form-control selectpicker" multiple data-live-search="true">
                                <option value="" disabled selected>choose option</option>
                                @if (count($tags) > 0)
                                    @foreach ($tags as $tag)
                                        <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
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
            .create(document.querySelector('#description'), {            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection

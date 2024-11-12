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
                    <h2>Create Page</h2>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ route('dashboard') }}">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}"
                                class="form-control" autocomplete="off" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                                placeholder="description">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Is Publish</label>
                            <select name="status" class="form-control">
                                <option value="" disabled selected>Choose option</option>
                                <option value="1">Publish</option>
                                <option value="0">Games</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="" disabled selected>Choose option</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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

@extends('layouts.auth')

@section('title', 'posts')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />

    <style>
        #outer {
            text-align: center;
        }

        .inner {
            display: inline-block;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Post Created</h2>
                </div>

                @if (Session::has('alert-success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{ session::get('alert-success') }}
                    </div>
                @endif

                <div class="card-body">

                    @if (count($posts) > 0)
                        <table class="table" id="posts">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ Str::limit($post->description, 15, '--') }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->status == 1 ? 'Active' : 'inActive' }}</td>
                                        <td id="outer">
                                            <a href="{{ route('posts.show', $post->id) }}"
                                                class="btn btn-sm btn-success inner"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('posts.edit', $post->id) }}"
                                                class="btn btn-sm btn-info inner"><i class="fas fa-edit"></i></a>
                                            <form method="post" action="{{ route('posts.destroy', $post->id) }}"
                                                class="inner">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"> <a class="btn btn-sm btn-danger"><i
                                                            class="fas fa-trash"></i></a></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center text-danger">No Post found..</h3>
                    @endif

                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    <script>
       ClassicEditor
            .create(document.querySelector('#description'),{

            })
            .catch(error => {
                console.error( error);
            });
    </script>
@endsection

@extends('layouts.auth')

@section('title', 'View posts')

@section('styles')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
     <link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper bg-white">
        <div class="content m-5">
                <div class="card-body">
                    @if ($post)
                        <div class="post-details">
                            <div class="post-detail">
                                <h1 class="mb-1 text-primary">{{ $post->title }}</h1>
                             </div>
                             <div class="post-detail">
                                <h1 class="text-body">{!! $post->description !!}</h1>
                            </div>

                            <div class="post-detail">
                                <h6>{{ $post->category->name }}</h6>
                            </div>

                            <div class="post-detail">
                                <p>{{ $post->user->name }}</p>
                            </div>

                            <div class="post-detail">
                                <p>{{ $post->status === 1 ? 'Published' : 'Draft' }}</p>
                            </div>

                        </div>
                    @else
                        <h3 class="text-center text-danger">No Post found..</h3>
                    @endif
                </div>
        </div>

    </div>


@endsection

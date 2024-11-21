@extends('layouts.auth')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <style>
        .card-hover {
            transition: transform 0.4s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 15 10px 20px rgba(212, 15, 114, 0.5);
        }
    </style>
@endsection

@section('content')
    <header class="main-header" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
            <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <span class="page-title">Dashboard</span>


            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown user-menu">
                        <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <img src="{{ asset('assets/auth/images/user/user-xs-01.jpg') }}"
                                class="user-image rounded-circle" alt="User Image" />
                            <span class="d-none d-lg-inline-block">John Doe</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-footer">
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a id="logout-button" class="dropdown-link-item" href="javascript:void(0)"> <i
                                            class="mdi mdi-logout"></i> Log Out </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                @foreach (['Posts' => $postsCount, 'Tags' => $tagsCount, 'Categories' => $categoriesCount, 'Users' => $usersCount] as $title => $count)
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-default" style="height: 140px">
                            <div class="card-header">
                                <h2>{{ $count }}</h2>
                                <div class="sub-title">
                                    <span class="mr-1">{{ $title }}</span>
                                    <i class="fa-solid fa-{{ strtolower($title) }}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h1 class="text-center mt-4 fw-bold">Blog Post</h1>
        </div>

        <div class="card-body m-6">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <a href="posts/{{ $post->id }}" class="p-2">
                        <div class="card card-hover mb-4 p-6 shadow-lg p-3 mb-5 bg-body rounded fs-1">
                            <div class="pb-5" style="cursor: pointer">
                                <img src="{{ asset('storage/auth/posts') . '/' . $post->gallery->image }}" alt="{{ $post->title }}" style="width: 100%; height: auto; max-height: 500px; object-fit: cover;" class="mb-3">
                                <h1>{{ $post->title }}</h1>
                                <p>{!! Str::limit(strip_tags($post->description), 500) !!}</p>
                                <p>{{ $post->category->name }}</p>
                                <a href="#" onclick="goBack()" class="btn btn-secondary pt-2 mt-3 fw-bolder">Back to
                                    Blog</a>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>


    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/auth/plugins/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/auth/js/chart.js') }}"></script>
@endsection

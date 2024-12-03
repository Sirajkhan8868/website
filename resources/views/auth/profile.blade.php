@extends('layouts.auth')

@section('title', 'Profile | Admin Dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/auth/css/multi-dropdown.css') }}">

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Update Profile</h2>
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

                    <form method="post" action="" >
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ old('name', $user ? $user->name: '') }}"
                                class="form-control" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ old('email', $user ? $user->email: '') }}"
                                class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password"
                                class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control" placeholder="coPassword">
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



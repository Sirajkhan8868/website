@extends('layouts.auth')

@section('title', 'Categories')

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
                    <h2>Category</h2>
                </div>


                <div class="card-body">

                    @if (count($categories) > 0)
                        <table class="table" id="posts">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center text-danger">No Category found..</h3>
                    @endif


                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#posts').DataTable({
                "lengthChange": false
            });
        });
    </script>
@endsection

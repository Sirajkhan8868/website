@extends('layouts.website')

@section('title', 'single blog')

@section('styles')

@endsection

@section('content')


    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-4 text-lg">Blog Single</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">Blog details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($blog)
        <section class="section blog-wrap bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12 mb-5">
                                <div class="single-blog-item">
                                    <img loading="lazy" src="{{ asset('storage/auth/posts/' . $blog->gallery->image) }}"
                                        alt="blog" class="img-fluid rounded">

                                    <div class="blog-item-content bg-white p-5">
                                        <div class="blog-item-meta bg-gray pt-2 pb-1 px-3">
                                            <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>
                                                {{ date('d-M-Y', strtotime($blog->created_at)) }}</span>

                                            <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>
                                                {{ count($comments) }}</span>
                                        </div>

                                        <h2 class="mt-3 mb-4">{{ $blog->title }}</h2>
                                        <p class="lead mb-4">{{ Str::limit($blog->description, 700) }}</p>


                                        <div
                                            class="tag-option mt-5 d-block d-md-flex justify-content-between align-items-center">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item font-weight-bold">Tags:</li>
                                                @foreach ($blog->tags as $tag)
                                                    <li class="list-inline-item">
                                                        <a>{{ $tag->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-5">

                                @if ($errors->any())
                                    <div>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (Session::has('alert-success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success</strong>{{ Session::get('alert-success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                            </div>


                            <div class="col-lg-12 mb-5">
                                <form method="post" action="{{ route('post.comment', $blog->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Comment</label>
                                        <textarea name="comment" id="comment" class="form-control" cols="20" rows="3"
                                            placeholder="Enter your here..."></textarea>
                                        <button type="submit" class="btn btn-sm btn-info mt-2"
                                            style="float: right"><strong>Comment</strong></button>
                                    </div>
                                </form>
                            </div>


                            {{--  comment start --}}



                            @if (count($comments) > 0)
                                <div class="col-lg-12 mb-5" id="#comment-section">
                                    <div class="comment-area card border-0 p-5">
                                        <h4 class="mb-4">{{ count($comments) }} Comments</h4>
                                        <ul class="comment-tree list-unstyled">

                                            @foreach ($comments as $comment)
                                                <li class="mb-5">
                                                    <div class="comment-area-box">
                                                        <img loading="lazy" alt="comment-author"
                                                            src="{{ asset('assets/site/images/user/profile.png') }}" style="width: 40px"
                                                            class="img-fluid float-left mr-3 mt-2">


                                                        <h5 class="mb-1">{{ $comment->user ? $comment->user->name : '' }}
                                                        </h5>
                                                        <span>{{ $comment->user ? $comment->user->email : '' }}</span>

                                                        <div
                                                            class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
                                                            <span class="date-comm">Posted
                                                                {{ $comment->user ? date('M d D Y', strtotime($comment->created_at)) : '' }}
                                                            </span>
                                                        </div>

                                                        <div class="comment-content mt-3">
                                                            <p>{{ $comment ? $comment->comment : '' }}</p>
                                                        </div>

                                                        {{-- delete --}}

                                                        <div class="mt-3">
                                                            @if ($comment->commentReplies)
                                                                @foreach ($comment->commentReplies as $reply)
                                                                    <form method="POST"
                                                                        action="{{ route('comment.reply.delete') }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden" name="reply_id"
                                                                            value="{{ $reply->id }}">
                                                                        <div
                                                                            class="comment-meta mt-lg-0 mt-md-0 float-lg-right float-md-right bg-danger">
                                                                            <span class="date-comm"><button type="submit"
                                                                                    class="bg-danger"
                                                                                    style="pt-1"><i
                                                                                        class="fas fa-trash text-white  btn-sm"></i></button>
                                                                            </span>
                                                                        </div>
                                                                    </form>

                                                                    <div class="comment-content mt-3">
                                                                        <p>{{ $reply->comment }}</p>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>


                                                        <span class="show-reply" style="float: right; cursor: pointer;">Show
                                                            reply</span>

                                                        <div class="form-group comment-reply-div">
                                                            <form method="POST"
                                                                action="{{ route('comment.reply', $comment->id) }}">
                                                                @csrf
                                                                <textarea name="comment" id="comment" class="form-control" cols="20" rows="3"
                                                                    placeholder="Enter your comment here..."></textarea>
                                                                <button id="reply-btn" type="submit"
                                                                    class="btn btn-sm btn-info mt-2"
                                                                    style="float: right"><strong>Reply</strong></button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>



                            @endif

                            <div class="col-md-12 mt-3">
                                <span>{{ $comments->links() }}</span>
                            </div>

                            {{-- comment --}}

                        </div>
                    </div>

                    {{-- posts --}}

                    <div class="col-lg-4 mt-5 mt-lg-0">

                        @if (count($latestPosts) > 0)

                            <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                                <h5>Latest Posts</h5>

                                @foreach ($latestPosts as $post)
                                    <div class="media border-bottom py-3">
                                        <a href="{{ route('single-blog', $post->id) }}">
                                            <img loading="lazy"
                                                src="{{ asset('storage/auth/posts/' . $blog->gallery->image) }}"
                                                alt="blog" style="width: 150px; padding: 10px 20px"></a>

                                        <div class="media-body">
                                            <h6 class="my-2"><a
                                                    href="{{ route('single-blog', $post->id) }}">{{ $post->title }}</a>
                                            </h6>
                                            <span
                                                class="text-sm text-muted">{{ date('d M Y', strtotime($post->created_at)) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        @endif


                        {{-- <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                            <h5 class="mb-4">Tags</h5>
                            @if (count($tag) > 0)

                            @foreach ($tags as $tag)

                            <a>{{ $tag->name }}</a>


                            @endforeach
                            @endif
                            <h6 class="text-center text-danger">No Tag found</h6>
                        </div> --}}

                        <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                            <h5 class="mb-4">Tags</h5>

                            <a>web</a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <h3 class="text-danger text-center mt-5">Unable to locate the blog, please go back and try again.</h3>

    @endif

@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="" crossorigin="anonymous"></script>

    <script>
        $('.comment-reply-div').hide();
        $(document).ready(function() {

            $('.show-reply').on('click', function() {
                $(this).siblings('.comment-reply-div').toggle('swing')
                $('.comment-reply-div').show();
            });
        });
    </script>
@endsection

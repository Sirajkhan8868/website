@extends('layouts.website')

@section('title', 'single blog')

@section('content')


    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">News details</span>
                        <h1 class="text-capitalize mb-4 text-lg">Blog Single</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item text-white-50">News details</li>
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
                            <img loading="lazy" src="{{ asset('storage/auth/posts/' . $blog->gallery->image) }}" alt="blog" class="img-fluid rounded">

                            <div class="blog-item-content bg-white p-5">
                                <div class="blog-item-meta bg-gray pt-2 pb-1 px-3">
                                            <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> {{ date('d-M-Y', strtotime($blog->created_at)) }}</span>

                                    <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>5
                                        Comments</span>
                                </div>

                                <h2 class="mt-3 mb-4">{{ $blog->title }}</h2>
                                <p class="lead mb-4">{{ strip_tags($blog->description) }}</p>


                                <div
                                    class="tag-option mt-5 d-block d-md-flex justify-content-between align-items-center">
                                    <ul class="list-inline">
                                        <li>Tags:</li>
                                         @foreach ($blog->tags as $tag)
                                         <li class="list-inline-item"><a href="#" rel="tag">{{ $tag->name  }}</a></li>
                                         @endforeach

                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>



                   <div class="col-lg-12 mb-5">
                      <div class="form-group">
                        <label for="">Comment</label>
                        <textarea name="comment" id="comment" class="form-control"  cols="20" rows="3">Enter your here.....</textarea>
                        <button class="btn btn-sm btn-info mt-2" style="float: right"><strong>Comment</strong></button>
                    </div>
                   </div>

                    <div class="col-lg-12 mb-5">
                        <div class="comment-area card border-0 p-5">
                            <h4 class="mb-4">2 Comments</h4>
                            <ul class="comment-tree list-unstyled">
                                <li class="mb-5">
                                    <div class="comment-area-box">
                                        <img src="{{ asset('assets/site/images/blog/test1.jpg') }}" alt="comment-author"  class="img-fluid float-left mr-3 mt-2">

                                        <h5 class="mb-1">Philip W</h5>
                                        <span>United Kingdom</span>

                                        <div class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
                                            <a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply |</a>
                                            <span class="date-comm">Posted October 7, 2018 </span>
                                        </div>

                                        <div class="comment-content mt-3">
                                            <p>Some consultants are employed indirectly by the client via a consultancy
                                                staffing company, a
                                                company that provides consultants on an agency basis. </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Comment</label>
                                        <textarea name="comment" id="comment" class="form-control"  cols="20" rows="3">Enter your here.....</textarea>
                                        <button class="btn btn-sm btn-info mt-2" style="float: right"><strong>Reply</strong></button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <form class="contact-form bg-white rounded p-5" id="comment-form">
                            <h4 class="mb-4">Write a comment</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="name" id="name"
                                            placeholder="Name:">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="mail" id="mail"
                                            placeholder="Email:">
                                    </div>
                                </div>
                            </div>


                            <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5"
                                placeholder="Comment"></textarea>

                            <input class="btn btn-main btn-round-full" type="submit" name="submit-contact"
                                id="submit_contact" value="Submit Message">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="sidebar-wrap">
                    <div class="sidebar-widget search card p-4 mb-3 border-0">
                        <input type="text" class="form-control" placeholder="search">
                        <a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>
                    </div>

                    <div class="sidebar-widget card border-0 mb-3">
                        <img loading="lazy" src="{{ asset('assets/site/images/blog/4.jpg') }}" alt="blog-author" class="img-fluid">
                        <div class="card-body p-4 text-center">
                            <h5 class="mb-0 mt-4">Arther Conal</h5>
                            <p>Digital Marketer</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, dolore.</p>

                            <ul class="list-inline author-socials">
                                <li class="list-inline-item mr-3">
                                    <a href="#"><i class="fab fa-facebook-f text-muted"></i></a>
                                </li>
                                <li class="list-inline-item mr-3">
                                    <a href="#"><i class="fab fa-twitter text-muted"></i></a>
                                </li>
                                <li class="list-inline-item mr-3">
                                    <a href="#"><i class="fab fa-linkedin-in text-muted"></i></a>
                                </li>
                                <li class="list-inline-item mr-3">
                                    <a href="#"><i class="fab fa-pinterest text-muted"></i></a>
                                </li>
                                <li class="list-inline-item mr-3">
                                    <a href="#"><i class="fab fa-behance text-muted"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                        <h5>Latest Posts</h5>

                        <div class="media border-bottom py-3">
                            <a href="#"><img loading="lazy" class="mr-4" src="{{ asset('assets/site/images/blog/bt-3.jpg') }}"
                                    alt="blog"></a>
                            <div class="media-body">
                                <h6 class="my-2"><a href="#">Thoughtful living in los Angeles</a></h6>
                                <span class="text-sm text-muted">03 Mar 2018</span>
                            </div>
                        </div>

                        <div class="media border-bottom py-3">
                            <a href="#"><img loading="lazy" class="mr-4" src="{{ asset('assets/site/images/blog/bt-2.jpg') }}"
                                    alt="blog"></a>
                            <div class="media-body">
                                <h6 class="my-2"><a href="#">Vivamus molestie gravida turpis.</a></h6>
                                <span class="text-sm text-muted">03 Mar 2018</span>
                            </div>
                        </div>

                        <div class="media py-3">
                            <a href="#"><img loading="lazy" class="mr-4" src="{{ asset('assets/site/images/blog/bt-1.jpg') }}"
                                    alt="blog"></a>
                            <div class="media-body">
                                <h6 class="my-2"><a href="#">Fusce lobortis lorem at ipsum semper sagittis</a>
                                </h6>
                                <span class="text-sm text-muted">03 Mar 2018</span>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                        <h5 class="mb-4">Tags</h5>

                        <a href="#">Web</a>
                        <a href="#">agency</a>
                        <a href="#">company</a>
                        <a href="#">creative</a>
                        <a href="#">html</a>
                        <a href="#">Marketing</a>
                        <a href="#">Social Media</a>
                        <a href="#">Branding</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  @else
  <h3 class="text-danger text-center mt-5">Unable to locate the blog, please go back and try again.</h3>

 @endif

@endsection

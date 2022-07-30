@extends('frontend.master')

@section('frontend_content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Blog</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.dashboard')}}}}">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Blog Area -->
    <section class="blog_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <!-- Single News Area -->
                    <div class="single_blog_area">
                        <div class="blog_post_thumb">
                            <a href="single-blog.html"><img src="{{url('/frontend/img/bg-img/blog-1.jpg')}}" alt="blog-post-thumb"></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <a href="#">9 Aug</a>
                                <span>3 min read</span>
                            </div>
                        </div>
                        <div class="blog_post_content">
                            <a href="single-blog.html" class="blog_title">Eye Fashion Week 9 - 16 Aug 2019</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus. Tenetur sit dolore nesciunt ipsum aspernatur nam et, expedita placeat labore alias consequatur accusamus autem aliquam optio assumenda obcaecati.</p>
                            <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single_blog_area">
                        <div class="blog_post_thumb">
                            <a href="single-blog.html"><img src="{{url('/frontend/img/bg-img/blog-2.jpg')}}" alt="blog-post-thumb"></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <a href="#">8 Aug</a>
                                <span>9 min read</span>
                            </div>
                        </div>
                        <div class="blog_post_content">
                            <a href="single-blog.html" class="blog_title">Casual Fashion Design Contest</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus. Tenetur sit dolore nesciunt ipsum aspernatur nam et, expedita placeat labore alias consequatur accusamus autem aliquam optio assumenda obcaecati.</p>
                            <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single_blog_area">
                        <div class="blog_post_thumb">
                            <a href="single-blog.html"><img src="{{url('/frontend/img/bg-img/blog-3.jpg')}}" alt="blog-post-thumb"></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <a href="#">6 Aug</a>
                                <span>4 min read</span>
                            </div>
                        </div>
                        <div class="blog_post_content">
                            <a href="single-blog.html" class="blog_title">Top 10 Handbags in 2019</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus. Tenetur sit dolore nesciunt ipsum aspernatur nam et, expedita placeat labore alias consequatur accusamus autem aliquam optio assumenda obcaecati.</p>
                            <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single_blog_area">
                        <div class="blog_post_thumb">
                            <a href="single-blog.html"><img src="{{url('/frontend/img/bg-img/blog-4.jpg')}}" alt="blog-post-thumb"></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <a href="#">5 Aug</a>
                                <span>2 min read</span>
                            </div>
                        </div>
                        <div class="blog_post_content">
                            <a href="single-blog.html" class="blog_title">Leather Shoes Festivals on DW Mart</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus. Tenetur sit dolore nesciunt ipsum aspernatur nam et, expedita placeat labore alias consequatur accusamus autem aliquam optio assumenda obcaecati.</p>
                            <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single News Area -->
                    <div class="single_blog_area">
                        <div class="blog_post_thumb">
                            <a href="single-blog.html"><img src="{{url('/frontend/img/bg-img/blog-5.jpg')}}" alt="blog-post-thumb"></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <a href="#">1 Aug</a>
                                <span>11 min read</span>
                            </div>
                        </div>
                        <div class="blog_post_content">
                            <a href="single-blog.html" class="blog_title">Fashion carnival was held</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, dolorem accusamus. Tenetur sit dolore nesciunt ipsum aspernatur nam et, expedita placeat labore alias consequatur accusamus autem aliquam optio assumenda obcaecati.</p>
                            <a href="single-blog.html">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="blog_sidebar">
                        <!-- Search Post -->
                        <div class="widget-area search_post mb-30">
                            <h6>Search Post</h6>
                            <form action="#" method="get">
                                <input type="search" class="form-control" placeholder="Enter Keyword...">
                                <button type="submit" class="btn d-none">Submit</button>
                            </form>
                        </div>

                        <!-- Latest Post -->
                        <div class="widget-area latest_post mb-30">
                            <h6>Recent Post</h6>

                            <!-- Recent Post -->
                            <div class="single_latest_post">
                                <div class="post-thumbnail">
                                    <img src="{{url('frontend/img/bg-img/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#">7 Quick Ways to Make a Great Event Successful</a>
                                    <p>5 min ago</p>
                                </div>
                            </div>

                            <!-- Recent Post -->
                            <div class="single_latest_post">
                                <div class="post-thumbnail">
                                    <img src="{{url('/frontend/img/bg-img/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#">7 Quick Ways to Make a Great Event Successful</a>
                                    <p>5 min ago</p>
                                </div>
                            </div>

                            <!-- Recent Post -->
                            <div class="single_latest_post">
                                <div class="post-thumbnail">
                                    <img src="{{url('/frontend/img/bg-img/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#">7 Quick Ways to Make a Great Event Successful</a>
                                    <p>5 min ago</p>
                                </div>
                            </div>
                        </div>

                        <!-- Catagory -->
                        <div class="widget-area catagory_section mb-30">
                            <h6>Catagory</h6>
                            <ul>
                                <li><a href="#">Women <span class="text-muted">(21)</span></a></li>
                                <li><a href="#">Men <span class="text-muted">(5)</span></a></li>
                                <li><a href="#">Fashion <span class="text-muted">(17)</span></a></li>
                                <li><a href="#">Electronice <span class="text-muted">(11)</span></a></li>
                                <li><a href="#">Sports <span class="text-muted">(16)</span></a></li>
                                <li><a href="#">Intimates <span class="text-muted">(9)</span></a></li>
                            </ul>
                        </div>

                        <!-- Achives -->
                        <div class="widget-area achive_section mb-30">
                            <h6>Achives</h6>
                            <ul>
                                <li><a href="#">September - 2019</a></li>
                                <li><a href="#">Auguest - 2019</a></li>
                                <li><a href="#">July - 2019</a></li>
                                <li><a href="#">June - 2019</a></li>
                                <li><a href="#">May - 2019</a></li>
                                <li><a href="#">April - 2019</a></li>
                            </ul>
                        </div>

                        <!-- Tages -->
                        <div class="widget-area tag_section mb-30">
                            <h6>Tags Cloud</h6>
                            <ul>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Electronice</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Intimates</a></li>
                                <li><a href="#">Kids</a></li>
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Rompers</a></li>
                                <li><a href="#">Bras</a></li>
                                <li><a href="#">Shorts</a></li>
                                <li><a href="#">Bottom</a></li>
                                <li><a href="#">T-shirts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Shop Pagination Area -->
                    <div class="shop_pagination_area mt-5">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">8</a></li>
                                <li class="page-item"><a class="page-link" href="#">9</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->


  @endsection
@extends('backend.master')
@section('css')

@endsection
@section('admin_dashboard_content')

<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <h5>Product</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> collapse</span><span style="display:none"><i
                                            class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row my-4">
                                <div class="col-md-6 col-lg-6">
                                    <span class="mb-4 float-left"><strong>Product Details</strong></span>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <a class="float-right btn btn-outline-info"
                                        href="{{route('admin.product.list')}}">Product List</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 text-center">
                                    <!-- <img class="w-100 border-radius-lg shadow-lg mx-auto"
                                                src="url('/uploads/products/' . $product->product_photo)" alt="$product->product_photo . 'photo'">
                                           url('/uploads/product_images/'. optional($product->image)->first(images))

                                           url('/uploads/product_images/' . $images->last())
                                            -->
                                    @if (($images->count())>0)
                                    <img class="w-100 border-radius-lg shadow-lg mx-auto"
                                        src="{{url('/uploads/product_images/' . $images->first()->image)}}"
                                        alt="{{url('/uploads/product_images/' . $images->first())}}">
                                    @endif
                                    <img src="">
                                    <div class="my-gallery d-flex mt-4 pt-2" itemscope
                                        itemtype="http://schema.org/ImageGallery">
                                        @foreach ($images as $image)
                                        <figure itemprop="associatedMedia" itemscope
                                            itemtype="http://schema.org/ImageObject">
                                            <a style="height: 70px; width: 70px;"
                                                href="{{url('/uploads/product_images/' . $image->image)}}"
                                                itemprop="contentUrl" data-size="500x600" class="mx-1">
                                                <img style="height: 70px; width: 70px;"
                                                    class="w-100 min-height-100 max-height-100 border-radius-lg shadow mx-1"
                                                    src="{{url('/uploads/product_images/' . $image->image)}}"
                                                    alt="Image description" />
                                            </a>
                                        </figure>
                                        @endforeach
                                    </div>

                                    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                                        <div class="pswp__bg"></div>

                                        <div class="pswp__scroll-wrap">


                                            <div class="pswp__container">
                                                <div class="pswp__item"></div>
                                                <div class="pswp__item"></div>
                                                <div class="pswp__item"></div>
                                            </div>

                                            <div class="pswp__ui pswp__ui--hidden">
                                                <div class="pswp__top-bar">

                                                    <div class="pswp__counter"></div>
                                                    <button
                                                        class="btn btn-white btn-sm pswp__button pswp__button--close">Close
                                                        (Esc)</button>
                                                    <button
                                                        class="btn btn-white btn-sm pswp__button pswp__button--fs">Fullscreen</button>
                                                    <button
                                                        class="btn btn-white btn-sm pswp__button pswp__button--arrow--left">Prev
                                                    </button>
                                                    <button
                                                        class="btn btn-white btn-sm pswp__button pswp__button--arrow--right">Next
                                                    </button>


                                                    <div class="pswp__preloader">
                                                        <div class="pswp__preloader__icn">
                                                            <div class="pswp__preloader__cut">
                                                                <div class="pswp__preloader__donut"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                    <div class="pswp__share-tooltip"></div>
                                                </div>
                                                <div class="pswp__caption">
                                                    <div class="pswp__caption__center"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mx-auto">
                                    <h6 class="mb-0 mt-3">Product Name</h6>
                                    <h5>{{$product->product_name}}</h5>
                                    <div class="div">
                                        <br>
                                        <h6 class="mb-0 mt-3">Product Price</h6>
                                        <h5>{{$product->product_price}}</h5>
                                        <div class="div">
                                            @if(($product->product_quantity)>0)
                                            <span class="badge badge-success">In Stock</span>
                                            @else
                                            <span class="badge badge-success">Out of Stock</span>
                                            @endif
                                        </div>

                                        <br>
                                        <h3>Quantity</h3>
                                        <h5>{{$product->product_quantity}}</h5>
                                        <br>
                                        <h6 class="mb-0 mt-3">Product Parent Category</h6>
                                        <h5>{{optional($product->category)->name}}</h5>
                                        <br>
                                        <h6 class="mb-0 mt-3">Product Sub Category</h6>
                                        <h5>{{optional($product->subcategory)->name}}</h5>
                                        <br>
                                        <h6 class="mb-0 mt-3">Product Brand</h6>
                                        <h5>{{optional($product->brand)->name}}</h5>
                                        <br>
                                        <h6 class="mb-0 mt-3">Product weight</h6>
                                        <h5>{{$product->product_weight}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab"
                                            href="#description" role="tab" aria-controls="home"
                                            aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab"
                                            href="#summary" role="tab" aria-controls="profile"
                                            aria-selected="false">Summary</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <p class="mb-0">{!! $product->product_description !!}</p>
                                    </div>
                                    <div class="tab-pane fade" id="summary" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <p class="mb-0">{!! $product->product_summary !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>

    @endsection

    @push('scripts')

    @endpush

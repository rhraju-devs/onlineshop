@extends('backend.master')
@section('css')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
@endsection
@section('admin_dashboard_content')
<div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Product View</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>






                    <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-4">Product Details</h5>
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 text-center">
                                    <img class="w-100 border-radius-lg shadow-lg mx-auto"
                                        src="../../../assets/img/products/product-details-1.jpg" alt="chair">
                                    <div class="my-gallery d-flex mt-4 pt-2" itemscope
                                        itemtype="http://schema.org/ImageGallery">
                                        <figure itemprop="associatedMedia" itemscope
                                            itemtype="http://schema.org/ImageObject">
                                            <a href="../../../assets/img/products/product-details-2.jpg"
                                                itemprop="contentUrl" data-size="500x600">
                                                <img class="w-100 min-height-100 max-height-100 border-radius-lg shadow"
                                                    src="../../../assets/img/products/product-details-2.jpg"
                                                    alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="ms-3" itemprop="associatedMedia" itemscope
                                            itemtype="http://schema.org/ImageObject">
                                            <a href="../../../assets/img/products/product-details-3.jpg"
                                                itemprop="contentUrl" data-size="500x600">
                                                <img class="w-100 min-height-100 max-height-100 border-radius-lg shadow"
                                                    src="../../../assets/img/products/product-details-3.jpg"
                                                    itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="ms-3" itemprop="associatedMedia" itemscope
                                            itemtype="http://schema.org/ImageObject">
                                            <a href="../../../assets/img/products/product-details-4.jpg"
                                                itemprop="contentUrl" data-size="500x600">
                                                <img class="w-100 min-height-100 max-height-100 border-radius-lg shadow"
                                                    src="../../../assets/img/products/product-details-4.jpg"
                                                    itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
                                        <figure class="ms-3" itemprop="associatedMedia" itemscope
                                            itemtype="http://schema.org/ImageObject">
                                            <a href="../../../assets/img/products/product-details-5.jpg"
                                                itemprop="contentUrl" data-size="500x600">
                                                <img class="w-100 min-height-100 max-height-100 border-radius-lg shadow"
                                                    src="../../../assets/img/products/product-details-5.jpg"
                                                    itemprop="thumbnail" alt="Image description" />
                                            </a>
                                        </figure>
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
                                <div class="col-lg-5 mx-auto">
                                    <h3 class="mt-lg-0 mt-4">Minimal Bar Stool</h3>
                                    <div class="rating">
                                        <i class="material-icons text-lg">grade</i>
                                        <i class="material-icons text-lg">grade</i>
                                        <i class="material-icons text-lg">grade</i>
                                        <i class="material-icons text-lg">grade</i>
                                        <i class="material-icons text-lg">star_outline</i>
                                    </div>
                                    <br>
                                    <h6 class="mb-0 mt-3">Price</h6>
                                    <h5>$1,419</h5>
                                    <span class="badge badge-success">In Stock</span>
                                    <br>
                                    <h3>Quantity</h3>
                                    <label class="mt-4">Description</label>
                                    <ul>
                                        <li>The most beautiful curves of this swivel stool adds an elegant touch to any
                                            environment</li>
                                        <li>Memory swivel seat returns to original seat position</li>
                                        <li>Comfortable integrated layered chair seat cushion design</li>
                                        <li>Fully assembled! No assembly required</li>
                                    </ul>
                                    <div class="row mt-4">
                                        <div class="col-lg-5 mt-lg-0 mt-2">
                                            <label class="ms-0">Frame Material</label>
                                            <select class="form-control" name="choices-material" id="choices-material">
                                                <option value="Choice 1" selected="">Wood</option>
                                                <option value="Choice 2">Steel</option>
                                                <option value="Choice 3">Aluminium</option>
                                                <option value="Choice 4">Carbon</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-5 mt-lg-0 mt-2">
                                            <label class="ms-0">Color</label>
                                            <select class="form-control" name="choices-colors" id="choices-colors">
                                                <option value="Choice 1" selected="">White</option>
                                                <option value="Choice 2">Gray</option>
                                                <option value="Choice 3">Black</option>
                                                <option value="Choice 4">Blue</option>
                                                <option value="Choice 5">Red</option>
                                                <option value="Choice 6">Pink</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="ms-0">Quantity</label>
                                            <select class="form-control" name="choices-quantity" id="choices-quantity">
                                                <option value="Choice 1" selected="">1</option>
                                                <option value="Choice 2">2</option>
                                                <option value="Choice 3">3</option>
                                                <option value="Choice 4">4</option>
                                                <option value="Choice 5">5</option>
                                                <option value="Choice 6">6</option>
                                                <option value="Choice 7">7</option>
                                                <option value="Choice 8">8</option>
                                                <option value="Choice 9">9</option>
                                                <option value="Choice 10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-5">
                                            <button class="btn bg-gradient-primary mb-0 mt-lg-auto w-100" type="button"
                                                name="button">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Product Specification</h5>
                                <hr>
                                <a class="btn  btn-primary  m-t-5" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">Description</a>
                                <button class="btn btn-primary  m-t-5" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">Summary</button>
                            </div>
                            <div class="collapse" id="collapseExample1">
                                <div class="card-body">
                                    <p class="mb-0">abc</p>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample2">
                                <div class="card-body">
                                    <p class="mb-0">new</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
@endsection

@push('scripts')
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
@endpush
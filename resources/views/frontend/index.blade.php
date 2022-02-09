@extends('layouts.app')
@section('content')

<main class="main">
    <div class="intro-slider-container">
        <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
            @foreach ($banners as $item)
                <a href="/products">
                    <div class="intro-slide" style="background-image: url({{$item->photo}});">
                        <div class="container intro-content">
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->
                </a> 
            @endforeach
        </div><!-- End .owl-carousel owl-simple -->

        <span class="slider-loader text-white"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->


    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-1 mb-sm-0"">
                <a href="{{url('offers/' . encrypt('offer2'))}}">
                   <img src="assets/images/home/offer-2.jpeg" alt="">
                </a>
            </div>
            <div class="col-sm-6">
                <a href="{{url('offers/' . encrypt('offer1'))}}">
                   <img src="assets/images/home/offer-1.jpeg" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

    <div class="container">
        <div class="heading mb-2">
            <h2 class="title">Categories</h2><!-- End .title -->
        </div><!-- End .heading -->
    </div><!-- End .container -->
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-6 col-md-3">
                    <a href="{{url('categories/' . $category->slug)}}"><img src="{{url(@$category->photo)}}" alt="{{$category->title}}">{{$category->title}}</a>
                </div>
            @endforeach  
            {{-- <div class="col-6 col-md-3">
                <a href="{{url('categories')}}"><img src="https://www.globaldesi.in/media/homepage_content/2/0/20211006-gd-d-elegant-tops-women-online_1.jpg" alt="View All"></a>
            </div>   --}}
            {{-- <div class="col-6 col-md-3">
                <a href="#"><img src="https://www.globaldesi.in/media/homepage_content/2/0/20211006-gd-d-chic-trendy-_dresses-women-online.jpg" alt=""></a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#"><img src="https://www.globaldesi.in/media/homepage_content/2/0/20211005-gd-d-trendy-kurtas-women-online.jpg" alt=""></a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#"><img src="https://www.globaldesi.in/media/homepage_content/2/0/20211006-gd-d-stylish-sets-kurtas-women-online.jpg" alt=""></a>
            </div> --}}
        </div>
    </div>

    <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

    <div class="container">
        <div class="heading mb-2">
            <h2 class="title">New Arrivals</h2><!-- End .title -->
        </div><!-- End .heading -->
    </div><!-- End .container -->
    <div class="container">
        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":5
                            },
                            "1600": {
                                "items":6,
                                "nav": true
                            }
                        }
                    }'>

                    @if(isset($newArrivals) && $newArrivals->isNotEmpty())
                       @foreach ($newArrivals as $product)
                           <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-new">{{$product->tag}}</span>
                                    <a href="{{url('product/' .$product->slug)}}">
                                        <img src="{{asset(@$product->images()->first()->image)}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        @if(is_user_logged_in())
                                          <a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">add to wishlist</span></a>
                                        @else
                                          <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
                                        @endif
                                    </div><!-- End .product-action-vertical -->
                                </figure><!-- End .product-media -->
                                <?php
                                    $availableColors = $product->sizesstock()->groupBy('color_id')->get();
                                    $availableSizes = $product->sizesstock()->groupBy('size_id')->get();
                                ?>
                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{route('product',$product->category->slug)}}">{{$product->category->title}}</a>
                                    </div><!-- End .product-cat -->
                                    @if(isset($availableColors) && $availableColors->isNotEmpty())
                                        <div class="product-color row justify-content-center">  
                                            @foreach($availableColors as $color)     
                                                    <div class="radio has-color">
                                                        <label>
                                                            <input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio colorOptions">
                                                            <div class="custom-color"><span style="background-color:{{@$color->productColor->code}}" ></span></div>
                                                        </label>
                                                    </div>
                                            @endforeach 
                                        </div><!-- End .product-cat -->
                                    @endif
                                    <h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        ₹ {{$product->price }} <small>(MRP incl Taxes)</small>
                                    </div><!-- End .product-price -->
                                    <div class="atc-container">                                        
                                        <div class="mb-0">                                    
                                            <a href="javascript:void(0);" class="btn-cart add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>
                                        </div>
                                    </div>
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                       @endforeach
                    @endif

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container-fluid -->


    <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

    <div class="container">
        <div class="heading mb-2">
            <h2 class="title">Best Sellers</h2><!-- End .title -->
        </div><!-- End .heading -->
    </div><!-- End .container -->
    <div class="container">
        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":5
                            },
                            "1600": {
                                "items":6,
                                "nav": true
                            }
                        }
                    }'>

                    @if(isset($bestSellers) && $bestSellers->isNotEmpty())
                       @foreach ($bestSellers as $product)
                           <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-new">{{$product->tag}}</span>
                                    <a href="{{url('product/' .$product->slug)}}">
                                        <img src="{{asset(@$product->images()->first()->image)}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        @if(is_user_logged_in())
                                          <a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">add to wishlist</span></a>
                                        @else
                                          <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
                                        @endif
                                    </div><!-- End .product-action-vertical -->
                                </figure><!-- End .product-media -->
                                <?php
                                    $availableColors = $product->sizesstock()->groupBy('color_id')->get();
                                ?>  
                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{route('product',$product->category->slug)}}">{{$product->category->title}}</a>
                                    </div><!-- End .product-cat -->
                                    @if(isset($availableColors) && $availableColors->isNotEmpty())
                                        <div class="product-color row justify-content-center">  
                                            @foreach($availableColors as $color)     
                                                    <div class="radio has-color">
                                                        <label>
                                                            <input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio colorOptions">
                                                            <div class="custom-color"><span style="background-color:{{@$color->productColor->code}}" ></span></div>
                                                        </label>
                                                    </div>
                                            @endforeach 
                                        </div><!-- End .product-cat -->
                                    @endif
                                    <h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        ₹ {{$product->price }} <small>(MRP incl Taxes)</small>
                                    </div><!-- End .product-price -->
                                    <div class="atc-container">                                        
                                        <div class="mb-0">                                    
                                            <a href="javascript:void(0);" class="btn-cart add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>
                                        </div>
                                    </div>
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                       @endforeach
                    @endif
                   
                    
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container-fluid -->

    <div class="mb-5"></div><!-- End .mb-5 -->
    

    <div class="icon-boxes-container pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon text-dark mb-0">
                                    <i class="icon-truck"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                        <div class="col-3">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon text-dark mb-0">
                                    <i class="icon-random"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Easy Exchange</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                        <div class="col-3">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon text-dark mb-0">
                                    <i class="icon-check-circle-o"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Assured Quality</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                        <div class="col-3">
                            <div class="icon-box text-center">
                                <span class="icon-box-icon text-dark mb-0">
                                    <i class="icon-heart"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Hand Picked</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                    </div><!-- End .row -->
                </div>
            </div>
        </div><!-- End .container -->
    </div>


</main><!-- End .main -->

@endsection
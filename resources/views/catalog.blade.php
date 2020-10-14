@extends('layouts.app')

@section('popular')
    <a href="{{ route('post.show', ['id' => $setting->popular_id ]) }}" class="btn amado-btn mb-15">Paling Populer</a>
    <a href="{{ route('post.show', ['id' => $setting->new_id ]) }}" class="btn amado-btn active">Produk Baru</a>
@endsection

@section('content')
        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row">

                    @foreach ($posts as $post)
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-4 col-md-12 col-xl-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset($post->image) }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ asset($post->image) }}" alt="">
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">Rp {{$post->price}}</p>
                                    <a href="{{ route('post.show', ['id' => $post->id]) }}">
                                        <h6>{{ $post->title }}</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="cart">
                                        <a href="{{ route('post.show', ['id' => $post->id]) }}" data-toggle="tooltip" data-placement="left" title="Pesan via Whatsapp"><img src="{{ asset('img/whatsapp.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                        
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                @if ($posts->currentPage() != $posts->firstItem())
                                    <li class="page-item active"><a class="page-link" href="{{$posts->previousPageUrl()}}"><<</a></li>
                                @endif
                                @if ($posts->hasMorePages())
                                    <li class="page-item active"><a class="page-link" href="{{$posts->nextPageUrl()}}">>></a></li>                                    
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>    
@endsection
@extends('layouts.app')

@section('popular')
    <a href="{{ route('post.show', ['id' => $setting->popular_id ]) }}" class="btn amado-btn mb-15">Paling Populer</a>
    <a href="{{ route('post.show', ['id' => $setting->new_id ]) }}" class="btn amado-btn active">Produk Baru</a>
@endsection

@section('content')
            <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                @foreach ($posts as $post)
                    <!-- Single Catagory -->
                    <div class="single-products-catagory clearfix">
                        <a href="{{ route('post.show', ['id' => $post->id]) }}">
                            <img src="{{ asset($post->image) }}" alt="">
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <div class="line"></div>
                                <p>Rp. {{$post->price}}</p>
                                <h4>{{$post->title}}</h4>
                            </div>
                        </a>
                    </div>                    
                @endforeach

            </div>
        </div>
        <!-- Product Catagories Area End -->

@endsection
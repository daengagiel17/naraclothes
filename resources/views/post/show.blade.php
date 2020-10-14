@extends('layouts.app')

@section('popular')
    <a href="{{ route('post.show', ['id' => $setting->popular_id ]) }}" class="btn amado-btn mb-15">Paling Populer</a>
    <a href="{{ route('post.show', ['id' => $setting->new_id ]) }}" class="btn amado-btn active">Produk Baru</a>
@endsection

@section('content')
        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12 col-lg-7">

                        @foreach ($post->gambar->chunk(4) as $keys => $chunk)
                        <div class="single_product_thumb">
                            <div id="product_details_slider{{$keys}}" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @php $slide = 0; @endphp
                                  @foreach ($chunk as $key => $product)
                                    <li class="{{ $key == 0 || $key == 4 ?'active':'' }}" data-target="#product_details_slider{{$keys}}" data-slide-to="{{$slide}}" style="background-image: url(/{{$product->url}});">
                                    </li>
                                    @php $slide++ @endphp
                                  @endforeach
                                </ol>
                                <div class="carousel-inner">
                                  @foreach ($chunk as $key => $product)
                                    <div class="carousel-item {{ $key == 0 || $key == 4 ?'active':'' }}">
                                        <a class="gallery_img" href="{{ asset($product->url) }}">
                                            <img class="d-block w-100" src="{{ asset($product->url) }}">
                                        </a>
                                    </div>                                    
                                  @endforeach
                                </div>
                            </div>
                        </div>                            
                        @endforeach

                        {{-- <div class="single_product_thumb">
                            <div id="product_details_slider2" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider2" data-slide-to="0" style="background-image: url(/assets/img/product-img/pro-big-1.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider2" data-slide-to="1" style="background-image: url(/assets/img/product-img/pro-big-2.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider2" data-slide-to="2" style="background-image: url(/assets/img/product-img/pro-big-3.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider2" data-slide-to="3" style="background-image: url(/assets/img/product-img/pro-big-4.jpg);">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="{{ asset('assets/img/product-img/pro-big-1.jpg') }}">
                                            <img class="d-block w-100" src="{{ asset('assets/img/product-img/pro-big-1.jpg') }}" alt="First slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="{{ asset('assets/img/product-img/pro-big-2.jpg') }}">
                                            <img class="d-block w-100" src="{{ asset('assets/img/product-img/pro-big-2.jpg') }}" alt="Second slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="{{ asset('assets/img/product-img/pro-big-3.jpg') }}">
                                            <img class="d-block w-100" src="{{ asset('assets/img/product-img/pro-big-3.jpg') }}" alt="Third slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="{{ asset('assets/img/product-img/pro-big-4.jpg') }}">
                                            <img class="d-block w-100" src="{{ asset('assets/img/product-img/pro-big-4.jpg') }}" alt="Fourth slide">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">Rp {{$post->price}}</p>
                                <a href="product-details.html">
                                    <h6>{{$post->title}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>
                            <!-- Rp. 229.000 / pcs
                            Rp. 149.000 / pcs
                            BISA MENAMPUNG 7 - 10 BAJU
                            DAPATKAN DISCOUNT !!
                            Untuk pembelian barang sejumlah 2 pieces atau lebih
                            
                            tanpa syarat dan ketentuan apapun.
                            
                            Makin banyak orderan makin besar DISCOUNTNYA. -->
                            <div class="short_overview my-5">
                                <p>{{$post->description}}</p>
                                <h5>{{$post->excellence}}</h5>
                            </div>

                            <div class="product-meta-data mt-50">
                                <p>Emang harga {{$post->title}} berapa sis?</p>
                                <h3>Hanya dengan</h3>
                                <h5><strike>Rp {{$post->price_old}}</strike></h5>
                                <p class="product-price">Rp {{$post->price}}</p>
                                <p>Kamu sudah mendapatkan {{$post->title}} ini ! Silahkan klik tombol dibawah ini untuk pemesanan</p>
                            </div>
                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" id="button-atas" method="post" action="{{ route('pesan', ['id' => $post->id]) }}" method="post">
                                @csrf
                                <input type="text" value="1" name="button_id" hidden>
                                <button type="submit" class="btn amado-btn"><span class="fa fa-whatsapp"></span> Pesan via Whatsapp</button>
                            </form>

                            <div class="short_overview my-5">
                                @if ($post->size->isNotEmpty())
                                  <p>Tersedia berbagai ukuran loh.</p>
                                  <table class="table table-responsive-sm my-5">
                                      <tr>
                                        <th>Size</th>
                                        @foreach ($sizes as $size)
                                          <th>{{$size->name}}</th>                        
                                        @endforeach
                                      </tr>
                                      @foreach ($varSizes as $varSize)
                                        <tr>
                                          <td>{{$varSize->name}}</td>
                                          @foreach ($post->varSize as $varSizePost)
                                            @if ($varSize->id == $varSizePost->id)
                                              <td>{{$varSizePost->pivot->number}}</td>                            
                                            @endif
                                          @endforeach
                                        </tr>                      
                                      @endforeach
                                  </table>
                                @endif
                                <p>
                                    Kita jamin kamu puas dengan pembelian produk NARA CLOTHES.
                                </p>
                                <img src="{{ asset('assets/img/core-img/garansi.png') }}" alt="" style="width: 250px">
                                <p>
                                    Jika ada produk yang cacat, ukuran tidak sesuai, jahitan rusak, dan masalah lainnya.                                    
                                    Kita akan ganti 100% gratis.
                                    Ongkos kirim kita yang tanggung. Kamu tidak perlu mengeluarkan uang sepeserpun!
                                </p>
                                <h3>Jadi tunggu apalagi, sebelum stok kami habis</h3>
                            </div>

                            {{-- Pesan --}}
                            <form class="cart clearfix" id="button-bawah" action="{{ route('pesan', ['id' => $post->id]) }}" method="post">
                                @csrf
                                {{-- <input type="text" value="2" name="button_id" hidden> --}}
                                <button type="submit" name="button_id" value="2" class="btn amado-btn"><span class="fa fa-whatsapp"></span> Pesan via Whatsapp</button>
                            </form>

                            <div class="short_overview my-5">
                                <h6>
                                    Pengiriman barang dilakukan setiap hari.
                                    Estimasi waktu pengirimian tergantung lokasi penerima barang dan ekspedisi.
                                    Di luar estmasi waktu tersebut bila tidak ada kejelasan dari ekspedisi, maka pembeli akan menerima refound 100% dan barang dikembalikan kepada penjual.
                                    Penjual akan melakukan follow up hingga pengiriman sampai di tangan pembeli.
                                </h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
@endsection
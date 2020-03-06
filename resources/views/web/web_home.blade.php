@extends('mpnj.layout.main')

@section('title','Belanj | Situs Belanja Online Terlengkap, Aman, dan Nyaman')


@section('content')


<div class="container">
    <!-- ========================= SECTION MAIN  ========================= -->
    <section class="section-main padding-y">
        <main class="card">
            <div class="card-body">

                <div class="row">
                    <aside class="col-lg col-md-3 flex-lg-grow-0">
                        <h6>KATEGORI</h6>
                        <nav class="nav-home-aside">
                            <ul class="menu-category">
                                @foreach ($kategori as $k)
                                <li><a href="{{ URL::to('produk?kategori='.strtolower($k->nama_kategori)) }}">{{ $k->nama_kategori }}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </aside> <!-- col.// -->
                    <div class="col-md-9 col-xl-7 col-lg-7">

                        <!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
                        <div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel1_indicator" data-slide-to="1"></li>
                                <li data-target="#carousel1_indicator" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ url('assets/mpnj/images/banners/ppnj.jpg') }}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ url('assets/mpnj/images/banners/Unilever.png') }}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ url('assets/mpnj/images/banners/nippon.jpg') }}" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->

                    </div> <!-- col.// -->
                    <div class="col-md d-none d-lg-block flex-grow-1">
                        <aside class="special-home-right">
                            <h6 class="bg-blue text-center text-white mb-0 p-2">Popular category</h6>

                            <div class="card-banner border-bottom">
                                <div class="py-3" style="width:80%">
                                    <h6 class="card-title">Men clothing</h6>
                                    <a href="#" class="btn btn-secondary btn-sm"> Source now </a>
                                </div>
                                <img src="{{ url('assets/mpnj/images/items/1.jpg') }}" height="80" class="img-bg">
                            </div>

                            <div class="card-banner border-bottom">
                                <div class="py-3" style="width:80%">
                                    <h6 class="card-title">Winter clothing </h6>
                                    <a href="#" class="btn btn-secondary btn-sm"> Source now </a>
                                </div>
                                <img src="{{ url('assets/mpnj/images/items/2.jpg') }}" height="80" class="img-bg">
                            </div>

                            <div class="card-banner border-bottom">
                                <div class="py-3" style="width:80%">
                                    <h6 class="card-title">Home inventory</h6>
                                    <a href="#" class="btn btn-secondary btn-sm"> Source now </a>
                                </div>
                                <img src="{{ url('assets/mpnj/images/items/6.jpg') }}" height="80" class="img-bg">
                            </div>

                        </aside>
                    </div> <!-- col.// -->
                </div> <!-- row.// -->

            </div> <!-- card-body.// -->
        </main> <!-- card.// -->

    </section>
    <!-- ========================= SECTION MAIN END// ========================= -->



    <!-- =============== SECTION DEAL =============== -->
    <section class="padding-bottom">
        <div class="card card-deal">
            <div class="col-heading content-body">
                <header class="section-heading">
                    <h3 class="section-title">Deals and offers</h3>
                    <p>Hygiene equipments</p>
                </header><!-- sect-heading -->
                <div class="timer">
                    <div> <span class="num">04</span> <small>Days</small></div>
                    <div> <span class="num">12</span> <small>Hours</small></div>
                    <div> <span class="num">58</span> <small>Min</small></div>
                    <div> <span class="num">02</span> <small>Sec</small></div>
                </div>
            </div> <!-- col.// -->
            <div class="row no-gutters items-wrap">
                <div class="col-md col-6">
                    <figure class="card-product-grid card-sm">
                        <a href="#" class="img-wrap">
                            <img src="{{ url('assets/mpnj/images/items/3.jpg') }}">
                        </a>
                        <div class="text-wrap p-3">
                            <a href="#" class="title">Summer clothes</a>
                            <span class="badge badge-danger"> -20% </span>
                        </div>
                    </figure>
                </div>
                <div class="col-md col-6">
                    <figure class="card-product-grid card-sm">
                        <a href="#" class="img-wrap">
                            <img src="{{ url('assets/mpnj/images/items/4.jpg') }}">
                        </a>
                        <div class="text-wrap p-3">
                            <a href="#" class="title">Some category</a>
                            <span class="badge badge-danger"> -5% </span>
                        </div>
                    </figure>
                </div>
                <div class="col-md col-6">
                    <figure class="card-product-grid card-sm">
                        <a href="#" class="img-wrap">
                            <img src="{{ url('assets/mpnj/images/items/5.jpg') }}">
                        </a>
                        <div class="text-wrap p-3">
                            <a href="#" class="title">Another category</a>
                            <span class="badge badge-danger"> -20% </span>
                        </div>
                    </figure>
                </div>
                <div class="col-md col-6">
                    <figure class="card-product-grid card-sm">
                        <a href="#" class="img-wrap">
                            <img src="{{ url('assets/mpnj/images/items/6.jpg') }}">
                        </a>
                        <div class="text-wrap p-3">
                            <a href="#" class="title">Home apparel</a>
                            <span class="badge badge-danger"> -15% </span>
                        </div>
                    </figure>
                </div>
                <div class="col-md col-6">
                    <figure class="card-product-grid card-sm">
                        <a href="#" class="img-wrap">
                            <img src="{{ url('assets/mpnj/images/items/7.jpg') }}">
                        </a>
                        <div class="text-wrap p-3">
                            <a href="#" class="title text-truncate">Smart watches</a>
                            <span class="badge badge-danger"> -10% </span>
                        </div>
                    </figure>
                </div>
            </div>
        </div>

    </section>
    <!-- =============== SECTION DEAL // END =============== -->

    <!-- =============== SECTION ITEMS =============== -->
    <section class="padding-bottom-sm">

        <header class="section-heading heading-line">
            <h4 class="title-section text-uppercase">PRODUK TERBARU</h4>
        </header>

        <div class="row row-sm">
            @foreach($produk as $p)
            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <div href="{{ URL::to('produk/'.$p->id_produk) }}" class="card card-sm card-product-grid">
                    <a href="{{ URL::to('produk/'.$p->id_produk) }}" class="img-wrap"> <img src="{{ asset('assets/foto_produk/'.$p->foto_produk[0]->foto_produk) }}"> </a>
                    <figcaption class="info-wrap">
                        <a href="{{ URL::to('produk/'.$p->id_produk) }}" class="title">{{ $p->nama_produk }}</a>
                        <div class="price mt-1">
                            @if($p->diskon == 0)
                            @currency($p->harga_jual)
                            @else
                            <strike style="color: red">
                                @currency($p->harga_jual)
                            </strike> @currency($p->harga_jual - ($p->diskon / 100 * $p->harga_jual))
                            @endif
                        </div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div>
            @endforeach
        </div> <!-- row.// -->
    </section>
    <!-- =============== SECTION ITEMS .//END =============== -->

    <article class="my-4">
        <img src="{{ asset('assets/mpnj/images/banners/ad-sm.png') }}" class="w-100">
    </article>
</div>
<!-- container end.// -->



@endsection
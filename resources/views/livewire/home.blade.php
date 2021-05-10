<div class="container mt-3">

    <div>
        <img class="rounded-2 img-fluid " src="{{asset("slider/slider1.png")}}" alt="slider">
    </div>

    <section>
        {{-- Pilih Liga --}}
        <strong class="fs-3 d-inline-block mt-5">Pilih Liga :</strong>
        <div class="row mt-3">
            @foreach ($liga as $item_liga)
                <div class="col-md-3">
                    <a href="{{route("liga_product", ["liga" => $item_liga->nama])}}" >
                        <div class="card shadow rounded-2 mt-3 bg-white" data-toggle="tooltip" title="{{$item_liga->nama}}">
                            <div class="card-body text-center">
                                <img class="img-fluid" src="{{ asset("liga/{$item_liga->gambar}") }}" alt="liga {{$item_liga->nama}}" style="max-height:100px ">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- Untuk Produk --}}
        <div class="row justify-content-between">
            <strong class="fs-3 d-inline-block mt-5">List Best Product :</strong>
            <a href="{{route("product")}}" class="mt-5 fs-3 d-inline-block text-light btn btn-secondary btn-sm">Lihat Semua Produk</a>
        </div>
        <div class="row mt-3">
            @foreach ($product as $item_product)
                <div class="col-md-4">
                    <div class="card shadow rounded-2 mt-3">
                        <div class="card-body text-center">
                            <img class="img-fluid" src="{{ asset("jersey/{$item_product->gambar}") }}" alt="" style="max-height:100px ">
                            <p class="text-center fw-bold">{{$item_product->nama}}</p>
                            <p class="text-center fw-bold">{{"Rp. " . number_format($item_product->harga)}}</p>

                            <div class="row mt-2">
                                <div class="col">
                                    <a href="{{route("product_detail", ["product" => $item_product->nama])}}" class="btn btn-secondary btn-sm d-block btn-block">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

</div>

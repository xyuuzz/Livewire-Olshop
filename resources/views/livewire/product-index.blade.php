<div class="container mt-3">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb ml-4 mr-4">
                <ol class="breadcrumb bg-light">
                  <li class="breadcrumb-item"><a class="text-dark" href="{{route("home")}} " style="text-decoration:none;">Home</a></li>
                  <li class="breadcrumb-item" aria-current="page">{{$route}}</li>
                </ol>
            </nav>
        </div>
    </div>

    <h3><strong class="fs-3 d-inline-block mt-1">{{$tulisan ?? "List Produk Untuk Semua Liga:"}}</strong></h3>

    @if(!request()->routeIs("liga_product"))
    <div class="form-group mt-4">
        <label for="search">Cari Jersey</label>
        <input name="query" type="text" class="form-control w-50" id="search" placeholder="Cari Jersey Kualitas Mantab" wire:model='search'>
    </div>
    @endif

    <div class="row mt-3 justify-content-center">
        @forelse ($product as $item_product)
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

            @empty
            <h2 class="mt-2">Tidak Ada Jersey</h2>
        @endforelse
    </div>

    {{$product->links("pagination::bootstrap-4")}}

</div>

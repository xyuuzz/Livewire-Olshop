<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb ml-4 mr-4">
                <ol class="breadcrumb bg-light">
                  <li class="breadcrumb-item"><a class="text-dark" href="{{route("home")}} " style="text-decoration:none;">Home</a></li>
                  <li class="breadcrumb-item" aria-current="page">Detail Product</li>
                  <li class="breadcrumb-item" aria-current="page"><strong>{!!$route!!}</strong></li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- untuk message session --}}
    @if(session()->has("success"))
        <div class="row">
            <div class="col-md-12">
                    <div class="alert alert-success">
                        {{session("success")}}
                    </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="{{ asset("jersey/{$product->gambar}") }}" alt="{{$product->nama}}" style="max-height:500px; background-color: #f1f1f1;" width=500px;>
        </div>

        <div class="col-md-6">
            <h2><strong>{{$product->nama}}</strong></h2>

            <div class="d-flex justify-content-between">
                <h5 class="mt-3">Rp {{number_format($product->harga)}}</h5>
                <h5>
                    <span class="mt-3 badge {{$product->is_ready ? "badge-success" : "badge-danger"}}">{{$product->is_ready ? "Barang Ready!!" : "Stok Kosong"}}</span>
                </h5>
            </div>
            <hr>

            <div class="card mt-5">
                <div class="card-header">
                    <h4>Deskripsi Produk</h4>
                </div>
                <div class="card-body">
                    <p>Liga : {{$product->liga->nama}}</p>
                    <p>Harga Nameset : Rp. {{number_format($product->harga_nameset)}}</p>
                    <p>Jenis : {{$product->jenis}}</p>
                    <p class="mb-2">Berat : {{$product->berat * 1000}} gram</p>

                <form wire:submit.prevent='masukan_keranjang'>

                    @if($nameset && $this->jumlah_pesanan < 2)
                        <hr>
                        {{-- input nomor nameset --}}
                        <input wire:model='nomor_nameset' id="nomor_nameset" type="number" class="col-5 form-control @error('nomor_nameset') is-invalid @enderror" value="{{ old('nomor_nameset') }}" placeholder="Nomor Jersey">
                        @error('nomor_nameset')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- input nama nameset --}}
                        <input wire:model='nama_nameset' id="nama_nameset" type="text" class="col-9 mt-2 form-control @error('nama_nameset') is-invalid @enderror" value="{{ old('nama_nameset') }}"  placeholder="Nama">
                        @error('nama_nameset')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    @endif



                <div class="mt-3 d-flex justify-content-between">
                    {{-- input tambah nameset --}}
                    @if($jumlah_pesanan < 2)
                        <label >Tambah Nameset
                        <input wire:model='nameset' type="checkbox" class="d-block">
                        </label>
                    @endif
                    {{-- tombol masukan keranjang --}}
                    <button type="submit" class="btn btn-sm btn-success btn-primary:hover mt-3"   {{$product->is_ready ? "" : "disabled"}}><i class="fas fa-shopping-cart mr-2"></i>Masukan Keranjang</button>
                </div>

                <label for="jumlah_pesanan" class="mt-1" >Jumlah Pesanan : </label>
                <input wire:model='jumlah_pesanan' id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" value="{{ old('jumlah_pesanan') }}" autocomplete="jumlah_pesanan" autofocus required>

                @error('jumlah_pesanan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                </form>
                </div>
            </div>
        </div>
    </div>

</div>

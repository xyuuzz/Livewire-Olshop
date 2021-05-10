<div class="container mt-3">

    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb ml-4 mr-4">
                <ol class="breadcrumb bg-light">
                  <li class="breadcrumb-item"><a class="text-dark" href="{{route("home")}} " style="text-decoration:none;">Home</a></li>
                  <li class="breadcrumb-item" aria-current="page">Keranjang</li>
                  <li class="breadcrumb-item text-bold" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>

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
        <div class="col">
            <a href="{{route('keranjang')}}" class="btn btn-sm btn-primary text-light"><i class="fa fa-arrow-left mr-2"></i>Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h4>Informasi Pembayaran</h4>
            <p>
                Untuk Pembayaran Silahkan Transfer di rekening dibawah dengan total sebesar <br>         <span class="bg-danger text-light">Rp. {{number_format($pesanan->total_harga)}}</span>
            </p>
            <div class="media">
                <img class="mr-3" src="https://topcareer.id/wp-content/uploads/2020/01/logo-bank-bri.jpg" alt="Bank BRI" max-height="200px" width="200px">
                <div class="media-body">
                  <h5 class="mt-0"><strong>Info Bank</strong></h5>
                    No. 19233127998291 AN. <strong>Maulana Yusuf Muhibbin</strong>
                </div>
            </div>
        </div>
        <div class="col mt-5">
            <h4>Informasi Pengiriman</h4>
            <hr>
            <form wire:submit.prevent='checkout'>
                <label>Nama Penerima</label>
                <input type="text" class="mt-2 form-control" value="{{ Auth::user()->name }}" disabled>

                <label for="no_hp">No Handphone</label>
                <input wire:model='no_hp' id="no_hp" type="text" class="mt-2 form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp')}}" name="no_hp">
                @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="alamat">Alamat</label>
                <textarea value="{{ old('alamat')}}" wire:model='alamat' name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" class="btn btn-sm btn-outline-success float-right mt-2">Pesan Sekarang</button>
            </form>
        </div>
    </div>

</div>




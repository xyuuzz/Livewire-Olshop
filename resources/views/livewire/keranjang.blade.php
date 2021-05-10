<div class="container mt-3">

    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb ml-4 mr-4">
                <ol class="breadcrumb bg-light">
                  <li class="breadcrumb-item"><a class="text-dark" href="{{route("home")}} " style="text-decoration:none;">Home</a></li>
                  <li class="breadcrumb-item" aria-current="page">Keranjang</li>
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
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Jersey</th>
                            <th>Name Set</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th class="text-primary">Total Harga</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesanan_detail as $detail)
                        <tr>
                            <th>{{$no}}</th>
                            <th>
                                <img class="img-fluid" src="{{ asset("jersey/{$detail->product->gambar}") }}" alt="" style="max-height:200px ">
                            </th>
                            <th>{{$detail->product->nama}}</th>
                            <th>{!!$detail->name_set ? '<i class="text-center far fa-check-circle"></i>' : "-"!!}</th>
                            <th>{{$detail->jumlah_pesanan}}</th>
                            <th>Rp. {{number_format($detail->product->harga)}}</th>
                            <th>Rp. {{number_format($detail->total_harga)}}</th>
                            <th>
                                <button wire:click='hapusKeranjang({{$detail->id}})' type="button" class="btn btn-sm">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </th>
                        </tr>
                        <?php $no++; ?>
                        @empty
                            <tr class="text-center text-bold">
                                <th colspan="7">Keranjang Anda Sekarang Sedang Kosong</th>
                            </tr>
                        @endforelse

                        @if(!empty($pesanan_detail))
                            <tr>
                                <td colspan="6" align="right">Total Harga : </td>
                                <td align="right">Rp. {{number_format($pesanan->total_harga)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right">Kode Unik : </td>
                                <td align="right">Rp. {{number_format($pesanan->kode_unik)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right">Total Harga Yang Harus Dibayar: </td>
                                <td align="right">Rp. {{number_format($pesanan->total_harga + $pesanan->kode_unik)}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td colspan="2">
                                    <a href="{{route("checkout")}}" class="btn btn-sm text-light bg-success">Checkout <i class="ml-1 fa fa-arrow-right"></i></a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>


</div>




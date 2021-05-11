<div class="container mt-2">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb ml-4 mr-4">
                <ol class="breadcrumb bg-light">
                  <li class="breadcrumb-item"><a class="text-dark" href="{{route("home")}} " style="text-decoration:none;">Home</a></li>
                  <li class="breadcrumb-item text-bold" aria-current="page">History</li>
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

    <div class="row mt-4">
        <div class="col">
            @forelse ($order as $item_order)
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-lg-flex d-sm-block">
                            <div class="col-sm position-relative">
                                @if ($item_order->order_detail()->count() === 2)
                                    <img src="{{asset("jersey/".$item_order->order_detail[0]->product->gambar)}}" alt="Jersey" class="img-fluid shadow">
                                    <img src="{{asset("jersey/".$item_order->order_detail[1]->product->gambar)}}" alt="Jersey" class="position-absolute img-fluid" style="right: 0px; max-width: 200px; max-height: 200px; top:125px;">
                                @elseif($item_order->order_detail()->count() === 3)
                                    <img src="{{asset("jersey/".$item_order->order_detail[0]->product->gambar)}}" alt="Jersey" class="img-fluid shadow">
                                    <img src="{{asset("jersey/".$item_order->order_detail[1]->product->gambar)}}" alt="Jersey" class="position-absolute img-fluid" style="right: 0px; max-width: 200px; max-height: 200px; top:125px;">
                                    <img src="{{asset("jersey/".$item_order->order_detail[2]->product->gambar)}}" alt="Jersey" class="position-absolute img-fluid" style="right: 180px; max-width: 150px; max-height: 150px; top:145px;">
                                @else
                                    <img src="{{asset("jersey/".$item_order->order_detail->first()->product->gambar)}}" alt="Jersey" class="img-fluid shadow">
                                @endif
                            </div>
                            <div class="col-lg-8 mt-4">
                                <h4>Info Barang Yang Dipesan</h4>
                                <div class="ml-2 mt-3">
                                    <p>
                                        <strong>Jersey yang Dipesan : </strong>
                                        <ul class="list-group col-lg-8">
                                            @foreach ($item_order->order_detail as $order_detail)
                                                <ol class="list-group-item list-group-item-info text-bold">
                                                    {{$order_detail->product->nama}} x{{$order_detail->jumlah_pesanan}}
                                                    <span class="float-md-right d-sm-block">
                                                        Rp.
                                                        {{number_format($order_detail->product->harga)}}
                                                    </span>
                                                </ol>
                                            @endforeach
                                        </ul>
                                    </p>
                                    <p><strong>Harga Total :</strong> Rp. {{number_format($item_order->total_harga + $item_order->kode_unik)}}</p>
                                    <p><strong>Kode Pemesanan</strong> :                              <span class="bg-secondary text-light">{{$item_order->kode_pesanan}}</span>
                                    </p>
                                    <p><strong>Status Pembayaran</strong> :
                                        <span class="{{$item_order->status == 1 ? 'bg-danger' : 'bg-success'}} text-light">{{$item_order->status == 1 ? 'Menunggu Dibayar' : 'Sudah Dibayar'}}</span>
                                    </p>
                                    <p><strong>Alamat Pengiriman</strong> : {{Auth::user()->alamat}}</p>
                                </div>
                            </div>
                        </div>
                        <span class="float-right text-light bg-dark p-1">{{$item_order->updated_at->diffForHumans()}}</span>
                    </div>
                </div>
            @empty
                <div class="card card-body text-center bg-danger text-light text-bold">
                    <h3>Anda Tidak Memiliki Pesanan Saat Ini</h3>
                </div>
            @endforelse
        </div>
    </div>

</div>

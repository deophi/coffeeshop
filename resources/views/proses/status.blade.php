@section('title', 'Status Order')
@include('admin.header')
  <div class="grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Pemesanan</h4>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Tempat </th>
                <th> Waktu </th>
                <th> Total Harga </th>
                <th> Status </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order as $r)
                <tr>
                  <td>
                    @if($r->tempat_id == NULL)
                      -
                    @else
                      {{ $r->tempat->nama }}
                    @endif
                  </td>
                  <td>{{ Carbon\Carbon::parse($r->waktu)->translatedFormat('l, d F Y - H:i')}}</td>
                  <td> Rp. {{ number_format($r->harga, 0,',','.') }} </td>
                  <td>
                    @if($r->status == 0)
                      <a href="{{ route('checkout.show', $r->id) }}"><p class="text-danger">Menunggu Pembayaran</p></a>
                    @elseif($r->status == 1)
                      <a class="text-danger">Menunggu Konfirmasi</a>
                    @elseif($r->status == 2)
                      <a class="text-warning">Dibooking</a>
                    @else
                      <a class="text-success">Selesai</a>
                    @endif
                  </td>
                </tr>
                <?php $menu = App\Models\Transaksi_detail::where('transaksi_id', $r->id)->get(); ?>
                <tr>
                  <th></th>
                  <th> Menu </th>
                  <th> Jumlah </th>
                </tr>
                @foreach ($menu as $m)
                  <tr>
                      <td></td>
                  <td>
                    @if($m->produk_id == NULL)
                      NULL
                    @else
                      <img src="{{ asset('images/produk/'.$m->produk->photo) }}" alt="image" />     {{ $m->produk->nama }}
                    @endif
                  </td>
                  <td>{{ $m->jumlah }}</td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@include('admin.footer')

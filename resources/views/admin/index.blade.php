@section('title', 'Dashboard')
@include('admin.header')
  <div class="grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Daftar Antrian Booking</h4>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Nama Pemesan </th>
                <th> Tempat </th>
                <th> Waktu </th>
                <th> Total Harga </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaksi as $r)
                <tr>
                  <td>{{ $r->biodata->nama }}</td>
                  <td>{{ $r->tempat->nama }}</td>
                  <td>{{ Carbon\Carbon::parse($r->waktu)->translatedFormat('l, d F Y - H:i')}}</td>
                  <td> Rp. {{ $r->harga }} </td>
                  <td width="10px">
                    <form action="{{ route('checkout.update', $r->id) }}" method="POST">
                      @csrf
                      @method('patch')
                      <input type="hidden" name="status" value="1">
                      <button class="btn btn-outline-warning">Konfirmasi</button>
                    </form>
                  </td>
                  <td width="5px">
                    <form action="{{ route('checkout.destroy', $r->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button class="btn btn-outline-danger">Tolak</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Daftar Booking Dikonfirmasi</h4>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Nama Pemesan </th>
                <th> Tempat </th>
                <th> Waktu </th>
                <th> Total Harga </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pesanan as $r)
                <tr>
                  <td>{{ $r->biodata->nama }}</td>
                  <td>{{ $r->tempat->nama }}</td>
                  <td>{{ Carbon\Carbon::parse($r->waktu)->translatedFormat('l, d F Y - H:i')}}</td>
                  <td> Rp. {{ $r->harga }} </td>
                  <td width="10px"><a href="" class="btn btn-outline-warning">Selesai</a></td>
                </tr>
                <tr>
                  <th></th>
                  <th></th>
                  <th>Nama Produk</th>
                  <th>Jumlah Pesanan</th>
                </tr>
                <tr>
                  <?php
                    $order = App\Models\Transaksi_detail::where('transaksi_id', $r->id)->get();
                  ?>
                  @foreach ($order as $t)
                    <td></td>
                    <td></td>
                    <td><img src="{{ asset('images/produk/'.$t->produk->photo) }}" alt="image" />     {{ $t->produk->nama }}</td>
                    <td>{{ $t->jumlah }}</td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@include('admin.footer')
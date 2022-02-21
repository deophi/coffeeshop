@section('title', 'Lakukan Pembayaran')
@include('auth.header')
      <div class="card-auth col-md-8 col-lg-5">
        <div class="card-body">
          <h3 class="card-title mb-3">@yield('title')</h3>
          <div class="row bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="col-8 col-lg-9 text-md-center text-xl-left">
              <h6 class="mb-1">Nominal Pembayaran</h6>
              <p class="text-muted mb-0">Kirim bukti pembayaran maksimal 15 menit sebelum waktu booking tempat dengan minimal pembayaran Rp. {{ $transaksi->harga * 0.5 }} sebagai uang muka.</p>
            </div>
            <div class="col-4 col-lg-3 align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
              <h6 class="font-weight-bold mb-0">Rp. {{ number_format($transaksi->harga, 0,',','.') }}</h6>
            </div>
          </div>
          <div class="row bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            @foreach ($rekening as $r)
            <div class="col-6 col-lg-7 text-md-center text-xl-left">
              <h6 class="mb-1">{{ $r->bank }}</h6>
              <p class="text-muted mb-0">{{ $r->norek }}</p>
            </div>
            <div class="col-6 col-lg-5 align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
              <h6 class="font-weight-bold mb-0">{{ $r->nama }}</h6>
            </div>
            @endforeach
          </div>
          <div class="row bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="col-6 col-lg-7 text-md-center text-xl-left">
              <h6 class="mb-1">Kirim Bukti Pembayaran</h6>
              <p class="text-muted mb-0">Melalui WhatsApp</p>
            </div>
            <div class="col-6 col-lg-5 align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
              <h6 class="font-weight-bold mb-0"><a href="http://wa.me/62{{ $setting->wa }}" target="_blank" style="text-decoration: none; color: yellow;">Link WhatsApp</a></h6>
            </div>
          </div>
        </div>
      </div>
@include('auth.footer')
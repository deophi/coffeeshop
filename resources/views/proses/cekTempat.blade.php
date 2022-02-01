@section('title', 'Checkout')
@include('admin.header')
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title mb-1">Nama Produk</h4>
            <p class="text-muted mb-1">Harga</p>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="preview-list">
                @foreach ($cart as $r)
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <div class="preview-icon">
                        <img src="{{ asset('images/produk/'.$r->produk->photo) }}">
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow">
                        <h6 class="preview-subject">{{ $r->produk->nama }}</h6>
                        <p class="text-muted mb-0">Jumlah: {{ $r->jumlah }}</p>
                      </div>
                      <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                        <p class="text-muted">Rp. {{ $r->produk->harga }} / pcs</p>
                        <p class="text-muted mb-0">Sub Total: Rp. {{ $r->produk->harga * $r->jumlah }} </p>
                      </div>
                    </div>
                  </div>                
                @endforeach
              </div>
            </div>
            <div class="col-12"><a class="btn btn-outline-warning" href="{{ route('index') }}">Ubah Pesanan</a></div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title">Waktu & Tempat</h4>
          </div>
          <form action="{{ route('cekTempat') }}" method="GET">
            <div class="form-group row">
              <div class="form-group col-12 row">
                <label class="col-4 col-form-label">Tanggal</label>
                <input type="text" class="form-control datepicker col-8" name="tgl" value="{{ $tgl }}">
                <script type="text/javascript">
                  $('.datepicker').datepicker();
                </script>
              </div>
              <div class="form-group col-12 row">
                <label class="col-4 col-form-label">Jam</label>
                <select class="form-control col-3" name="jam">
                  <option value="{{ $jam }}">{{ $jam }}</option>
                  @for ($i = 8; $i < 21; $i++)
                    @if (sprintf("%02d", $i).':00' != $jam)
                    <option value="{{ sprintf("%02d", $i) }}:00">{{ sprintf("%02d", $i) }}:00</option>
                    @endif
                    
                  @endfor
                </select>
              </div>
              <div class="col-12">
                <button class="btn btn-outline-warning">Cek Ketersediaan Tempat</button>
              </div>
            </div>
          </form>
          <div class="preview-list">
            <form action="{{ route('checkout.store') }}" method="POST">
              @csrf
              @foreach ($tempat as $r)
              <?php
                $terpakai = App\Models\Transaksi::whereDate('waktu', Carbon\Carbon::parse($tgl)->format('Y-m-d'))->whereTime('waktu', $jam)->where('tempat_id', $r->id)->count();
                $tersedia = $r->stok - $terpakai;
              ?>
              <div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <img src="{{ asset('images/tempat/'.$r->photo) }}" alt="image" class="rounded-circle" />
                </div>
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject">{{ $r->nama }}</h6>
                      <div class="form-check form-check-warning">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="tempat" value="{{ $r->id }}"
                          @if ($tersedia < 1)
                            disabled
                          @endif
                          >
                        </label>
                      </div>
                    </div>
                    <p class="text-muted">
                      @if ($tersedia > 0)
                        Tersedia
                      @else
                        <p style="color: red;">Tidak Tersedia</p>
                      @endif
                    </p>
                  </div>
                </div>
              </div>
              @endforeach
              <br>
              <button class="btn btn-outline-warning">Bayar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('admin.footer')
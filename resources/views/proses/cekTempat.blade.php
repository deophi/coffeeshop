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
                        <p class="text-muted">Rp. {{ number_format($r->produk->harga, 0,',','.') }} / pcs</p>
                        <p class="text-muted mb-0">Sub Total: Rp. {{ number_format($r->produk->harga * $r->jumlah, 0,',','.') }} </p>
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
                $foto     = App\Models\Tempat_photo::where('tempat_id', $r->id)->paginate(1);
              ?>
              <input type="hidden" name="tgl" value="{{ $tgl }}">
              <input type="hidden" name="jam" value="{{ $jam }}">
              <div class="preview-item border-bottom">
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
                <div class="row">
                  @foreach ($foto as $f)
                    <img src="{{ asset('images/tempat/'.$f->photo) }}" class="img-lg rounded" data-toggle="modal" data-target="#lihat{{ $r->id }}"/>
                  @endforeach
                </div>
              </div>
              {{-- Start Modal Lihat Gambar Tempat --}}
              <div class="modal fade" id="lihat{{ $r->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Foto Tempat {{ $r->nama }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="owl-carousel owl-theme full-width">
                        <?php $model = App\Models\Tempat_photo::where('tempat_id', $r->id)->get(); ?>
                        @foreach ($model as $f)
                          <div class="item">
                            <img src="{{ asset('images/tempat/'.$f->photo) }}" alt="">
                          </div>
                        @endforeach
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              {{-- End Modal Lihat Gambar Tempat --}}
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

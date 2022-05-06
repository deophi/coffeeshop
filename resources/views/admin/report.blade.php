@section('title', 'Dashboard')
@include('admin.header')
  <div class="grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Laporan Layanan</h4>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Nama Pemesan </th>
                <th> Tempat </th>
                <th> Waktu </th>
                <th> Total Harga </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($report as $r)
                <tr>
                  <td>{{ $r->biodata->nama }}</td>
                  <td>
                    @if ($r->tempat_id == NULL)
                      -
                    @else
                      {{ $r->tempat->nama }}
                    @endif
                  </td>
                  <td>{{ Carbon\Carbon::parse($r->waktu)->translatedFormat('l, d F Y - H:i')}}</td>
                  <td> Rp. {{ number_format($r->harga, 0,',','.') }} </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@include('admin.footer')

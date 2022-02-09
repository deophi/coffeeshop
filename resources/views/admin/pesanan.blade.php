@section('title', 'Daftar Pesanan')
@include('admin.header')
  <div class="grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Daftar Pesanan {{ $nama }}</h4>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Nama Produk </th>
                <th> Jumlah </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pesanan as $r)
                <tr>
                  <td>{{ $r->produk->nama }}</td>
                  <td>{{ $r->jumlah }}</td>
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
@include('admin.footer')
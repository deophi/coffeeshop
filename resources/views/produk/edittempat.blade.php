<div class="col-md-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Tempat</h4>
        <form class="forms-sample" action="{{ route('tempat.update', $produk->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <input type="hidden" name="id" value="{{ $produk->id }}">
          <div class="form-group">
            <input type="text" class="form-control" name="nama" value="{{ $produk->nama }}" required>
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="stok" value="{{ $produk->stok }}" required>
          </div>
          <button class="btn btn-warning float-right">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>

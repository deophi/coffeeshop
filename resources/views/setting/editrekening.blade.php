<div class="col-md-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Rekening</h4>
        <form class="forms-sample" action="{{ route('rekening.update', $item->id) }}" method="post">
          @csrf
          @method('patch')
          <div class="form-group">
            <input type="text" class="form-control" name="bank" value="{{ $item->bank }}" placeholder="Nama Bank">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="norek" value="{{ $item->norek }}" placeholder="Nomor Rekening">
          </div>
          <div class="form-group">
            <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" placeholder="Atas Nama">
          </div>
          <button class="btn btn-outline-warning float-right">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
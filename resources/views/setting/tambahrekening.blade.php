<div class="col-md-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Rekening</h4>
        <form class="forms-sample" action="{{ route('rekening.store') }}" method="post">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control" name="bank" placeholder="Nama Bank">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="norek" placeholder="Nomor Rekening">
          </div>
          <div class="form-group">
            <input type="text" name="nama" class="form-control" placeholder="Atas Nama">
          </div>
          <button class="btn btn-outline-warning float-right">Tambah</button>
        </form>
      </div>
    </div>
  </div>
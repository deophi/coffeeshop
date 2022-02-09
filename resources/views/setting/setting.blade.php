  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Pengaturan Umum</h4>
          <!-- <p><a href="" class="badge btn-outline-warning">Tambah</a></p> -->
        </div>
        <form action="{{ route('setting.update', 1) }}" method="POST">
          @csrf
          @method('patch')
          <div class="form-group">
            <label>WhatsApp</label>
            <input type="text" class="form-control" name="wa" value="0{{ $setting->wa }}">
          </div>
          <div class="form-group">
            <button class="btn btn-outline-warning float-right">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
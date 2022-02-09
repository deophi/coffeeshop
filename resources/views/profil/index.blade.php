@section('title', 'Profil')
@include('admin.header')
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Pengaturan Akun</h4>
          @if(Session::has('akun'))
            <blockquote class="blockquote blockquote-warning">
              <p>{{ Session('akun') }}</p>
            </blockquote>
          @elseif(Session::has('password'))
            <blockquote class="blockquote blockquote-warning">
              <p>{{ Session('password') }}</p>
            </blockquote>
          @endif
        </div>
        <form action="{{ route('profil.update', 1) }}" method="POST">
          @csrf
          @method('patch')
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label>Password Baru</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group col-6">
              <label>Konfirmasi Password</label>
              <input type="password" class="form-control" name="repassword">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-outline-warning float-right">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Data Diri</h4>
          @if(Session::has('biodata'))
            <blockquote class="blockquote blockquote-warning">
              <p>{{ Session('biodata') }}</p>
            </blockquote>
          @endif
        </div>
        <form action="{{ route('profil.update', 2) }}" method="POST">
          @csrf
          @method('patch')
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ Auth::user()->biodata->nama }}">
          </div>
          <div class="form-group">
            <label>No. HP</label>
            <input type="text" class="form-control" name="hp" value="{{ Auth::user()->biodata->hp }}">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{ Auth::user()->biodata->alamat }}">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="jk">
              <option value="1">Laki-Laki</option>
              <option value="2">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-outline-warning float-right">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@include('admin.footer')
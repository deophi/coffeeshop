@section('title', 'Daftar')
@include('auth.header')
            <div class="card-auth col-md-10 col-lg-6">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">@yield('title')</h3>
                @if(Session::has('pesan'))
                  <blockquote class="blockquote blockquote-warning">
                    <p>{{ Session('pesan') }}</p>
                  </blockquote>
                @endif
                <form action="{{ route('register') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Email</label>
                      <input type="email" class="form-control p_input" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Nama</label>
                      <input type="text" class="form-control p_input" name="nama" value="{{ old('nama') }}" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Password</label>
                      <input type="password" class="form-control p_input" name="password" required>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Ulangi Password</label>
                      <input type="password" class="form-control p_input" name="password_confirmation" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-7 col-md-8">
                      <label>No. HP</label>
                      <input type="text" class="form-control p_input" name="hp" value="{{ old('hp') }}" required>
                    </div>
                    <div class="form-group col-sm-5 col-md-4">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jk">
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control p_input" name="alamat" value="{{ old('alamat') }}" required>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Daftar</button>
                  </div>
                  <p class="sign-up">Sudah memiliki akun? <a href="{{ route('login') }}">Login</a></p>
                </form>
              </div>
            </div>
@include('auth.footer')
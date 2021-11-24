@section('title', 'Daftar')
@include('auth.header')
                <form action="{{ route('register') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Email</label>
                      <input type="text" class="form-control p_input" name="email" value="{{ old('email') }}" required>
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
                  <div class="form-group">
                    <label>No. HP</label>
                    <input type="text" class="form-control p_input" name="hp" value="{{ old('hp') }}" required>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control p_input" name="alamat" value="{{ old('alamat') }}" required>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Daftar</button>
                  </div>
                  <p class="sign-up">Sudah memiliki akun? <a href="#">Login</a></p>
                </form>
@include('auth.footer')
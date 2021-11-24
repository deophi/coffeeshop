@section('title', 'Login')
@include('auth.header')
                <form action="{{ route('login') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control p_input" name="email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" name="password">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <p class="sign-up">Belum memiliki akun? <a href="{{ route('register') }}">Daftar</a></p>
                </form>
@include('auth.footer')
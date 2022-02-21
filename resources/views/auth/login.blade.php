@section('title', 'Login')
@include('auth.header')
            <div class="card-auth col-md-8 col-lg-5">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">@yield('title')</h3>
                @if(Session::has('pesan'))
                  <blockquote class="blockquote blockquote-warning">
                    <p>{{ Session('pesan') }}</p>
                  </blockquote>
                @endif
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
              </div>
            </div>
@include('auth.footer')
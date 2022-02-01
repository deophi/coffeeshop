@include('landing.header')    
    <section class="home" id="home">
      <div class="content">
        <h3>Joe's Brother</h3>
        <p>Nikmatnya santai sambil meminum segelas kopi.</p>
        {{-- <a href="#" class="btn">get yours now</a> --}}
      </div>
    </section>

    <section class="menu" id="makanan">
      <h1 class="heading"> menu <span>makanan</span></h1>
      <div class="box-container">
        @foreach($makanan as $r)
          <div class="box">
            <img src="{{ asset('images/produk/'.$r->photo) }}" alt="">
            <h3>{{ $r->nama }}</h3>
            <div class="price">Rp. {{ $r->harga }}</div>
            @if(Auth::check())
              <form method="post" action="{{ route('store') }}">
                @csrf
                <button class="btn">Tambah ke Keranjang</button>
                <input type="hidden" name="id" value="{{ $r->id }}">
                <input type="hidden" id="qtymkn{{ $r->id }}" name="qty" value="1">
              </form>
            @else
              <a href="{{ route('login') }}" class="btn">Tambah ke Keranjang</a>
            @endif
            <br>
            <button class="btn" style="margin-right:25px;" onClick="kurangmkn({{ $r->id }})">-</button>
            <a id="countermkn{{ $r->id }}" class="price">1</a>
            <button class="btn" style="margin-left:25px;" onClick="tambahmkn({{ $r->id }})">+</button>
          </div>
        @endforeach
      </div>
    </section>
    
    <section class="menu" id="minuman">
      <h1 class="heading"> our <span>menu</span></h1>
      <div class="box-container">
        @foreach($minuman as $r)
          <div class="box">
            <img src="{{ asset('images/produk/'.$r->photo) }}" alt="">
            <h3>{{ $r->nama }}</h3>
            <div class="price">Rp. {{ $r->harga }}</div>
            @if (Auth::check())
              <form method="post" action="{{ route('store') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $r->id }}">
                <input type="hidden" id="qtymnm{{ $r->id }}" name="qty" value="1">
                <button class="btn">Tambah ke Keranjang</button>
              </form>
            @else
            <a href="{{ route('login') }}" class="btn">Tambah ke Keranjang</a>
            @endif
            <br>
            <button class="btn" style="margin-right:25px;" onClick="kurangmnm({{ $r->id }})">-</button>
            <a id="countermnm{{ $r->id }}" class="price">1</a>
            <button class="btn" style="margin-left:25px;" onClick="tambahmnm({{ $r->id }})">+</button>
          </div>
        @endforeach
      </div>
    </section>
@include('landing.footer')
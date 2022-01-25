<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('land/css/style.css') }}">
  </head>
  <body>
    <header class="header">
      <a href="{{ route('index') }}" class="logo"><img src="{{ asset('land/images/logo.png') }}" alt=""></a>
      <nav class="navbar">
        <a href="#home">home</a>
        {{-- <a href="#about">about</a> --}}
        <a href="#makanan">makanan</a>
        <a href="#minuman">minuman</a>
      </nav>
      
      <div class="icons">
        @if(!Auth::check())
          <a href="{{ route('login') }}">
            <div class="fas fa-sign-in-alt" title="Login"></div>
          </a>
        @else
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="fas fa-sign-out-alt" title="Logout"></div>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <div class="fas fa-shopping-cart" id="cart-btn" title="Keranjang Belanja"></div>
          <div class="fas fa-bars" id="menu-btn"></div>
        @endif
      </div>
      @if (Auth::check())
      <div class="cart-items-container">
        @foreach($cart as $r)
          <div class="cart-item">
            <form action="{{ route('destroy', $r->id) }}" method="POST">
              @csrf
              @method('delete')
              <button class="fas fa-times"></button>
            </form>
            <img src="{{ asset('images/produk/'.$r->produk->photo) }}">
            <div class="content">
              <h3>{{ $r->produk->nama }}</h3>
              <div class="price">Rp. {{ $r->produk->harga }}</div>
              <div class="price">Jumlah: {{ $r->jumlah }}</div>
              {{-- <div style="font-size: 20px;"><button class="mini-btn" onClick="cartdec({{ $r->id }})">-</button> <a id="cartqty{{ $r->id }}">{{ $r->jumlah }}</a> <button class="mini-btn" onClick="cartin({{ $r->id }})">+</button></div> --}}
            </div>
          </div>
        @endforeach

        <a href="#" class="btn">checkout now</a>
      </div>
      @endif
    </header>
@section('title', 'Dashboard')
@include('admin.header')
            <div class="row ">
              @include('produk.listmakanan')
              @include('produk.tambahmakanan')
            </div>

            <div class="row ">
              @include('produk.listminuman')
              @include('produk.tambahminuman')
            </div>

            <div class="row ">
              @include('produk.listtempat')
              @include('produk.tambahtempat')
            </div>
@include('admin.footer')
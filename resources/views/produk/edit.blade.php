@section('title', 'Edit Produk')
@include('admin.header')
            <div class="row ">
              @include('produk.listmakanan')
              @if($jenis == 1)
                @include('produk.editmakanan')
              @else
                @include('produk.tambahmakanan')
              @endif
            </div>

            <div class="row ">
              @include('produk.listminuman')
              @if($jenis == 2)
                @include('produk.editminuman')
              @else
                @include('produk.tambahminuman')
              @endif
            </div>

            <div class="row ">
              @include('produk.listtempat')
              @if($jenis == 3)
                @include('produk.edittempat')
              @else
                @include('produk.tambahtempat')
              @endif
            </div>
@include('admin.footer')
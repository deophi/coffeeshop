@section('title', 'Pengaturan')
@include('admin.header')
            <div class="row">
              @include('setting.setting')
            </div>
            <div class="row ">
              @include('setting.listrekening')
              @include('setting.tambahrekening')
            </div>
@include('admin.footer')
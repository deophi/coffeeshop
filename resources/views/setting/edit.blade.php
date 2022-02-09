@section('title', 'Pengaturan')
@include('admin.header')
            <div class="row">
              @include('setting.setting')
            </div>
            <div class="row ">
              @include('setting.listrekening')
              @include('setting.editrekening')
            </div>
@include('admin.footer')
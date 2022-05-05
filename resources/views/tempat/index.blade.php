@section('title', 'Foto Tempat')
@include('admin.header')
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Foto Tempat {{ $tempat->nama }}</h4>
          <p class="card-desccription"><a class="btn btn-outline-warning" data-toggle="modal" data-target="#tambah">Tambah</a></p>
          @foreach ($item as $r)
            <img src="{{ asset('images/tempat/'.$r->photo) }}" class="img-lg rounded" data-toggle="modal" data-target="#hapus{{ $r->id }}"/>
            {{-- Start Modal Lihat Gambar Tempat --}}
            <div class="modal fade" id="hapus{{ $r->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <center><img src="{{ asset('images/tempat/'.$r->photo) }}" width="450px"></center>
                  </div>
                  <div class="modal-footer">
                    <form action="{{ route('photoTempat.destroy', $r->id) }}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-outline-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- End Modal Lihat Gambar Tempat --}}
          @endforeach
        </div>
      </div>

      {{-- Start Modal Tambah Foto Tempat --}}
      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Foto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('photoTempat.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="tempatId" value="{{ $tempat->id }}">
              <div class="modal-body">
                <div class="form-group">
                  <input type="file" name="img" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control form-control-sm file-upload-info" disabled placeholder="Upload Gambar">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-warning" type="button">Pilih Gambar</button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-outline-warning">Simpan</button>
                <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      {{-- End Modal Tambah Foto Tempat --}}
@include('admin.footer')

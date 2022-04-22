              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Makanan</h4>
                    <form class="forms-sample" action="{{ route('produk.update', $produk->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                      <input type="hidden" name="i" value="1">
                      <input type="hidden" name="id" value="{{ $produk->id }}">
                      <div class="form-group">
                        <input type="text" class="form-control" name="nama" value="{{ $produk->nama }}">
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control" name="harga" value="{{ $produk->harga }}">
                      </div>
                      <div class="form-group">
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control form-control-sm file-upload-info" disabled placeholder="{{ $produk->photo }}">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-warning" type="button">Pilih Gambar</button>
                          </span>
                        </div>
                      </div>
                      <button class="btn btn-warning float-right">Simpan Perubahan</button>
                    </form>
                  </div>
                </div>
              </div>
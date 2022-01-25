              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Daftar Makanan</h4>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="i" value="1">
                      <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Makanan">
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control" name="harga" placeholder="Harga Makanan">
                      </div>
                      <div class="form-group">
                        <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control form-control-sm file-upload-info" disabled placeholder="Upload Gambar">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-warning" type="button">Pilih Gambar</button>
                          </span>
                        </div>
                      </div>
                      <button class="btn btn-warning float-right">Tambah</button>
                    </form>
                  </div>
                </div>
              </div>
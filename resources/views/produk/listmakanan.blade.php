              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">Daftar Makanan</h4>
                      <!-- <p><a href="" class="badge btn-outline-warning">Tambah</a></p> -->
                    </div>
                    @if(Session::has('makan'))
                      <blockquote class="blockquote blockquote-warning">
                        <p>{{ Session('makan') }}</p>
                      </blockquote>
                    @elseif(Session::has('delmakan'))
                      <blockquote class="blockquote blockquote-danger">
                        <p>{{ Session('delmakan') }}</p>
                      </blockquote>
                    @endif
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Nama Makanan </th>
                            <th></th>
                            <th> Harga </th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($makanan as $r)
                            <tr>
                              <td>
                                <span class="pl-2">{{ $r->nama }}</span>
                              </td>
                              <td><img src="{{ asset('images/produk/'.$r->photo) }}" alt="image" /></td>
                              <td> Rp. {{ number_format($r->harga, 0,',','.') }} </td>
                              <td width="30px">
                                <form method="post" action="{{ route('produk.destroy', $r->id) }}">
                                  @csrf
                                  @method('delete')
                                  <a href="{{ route('produk.edit', $r->id) }}" class="btn btn-outline-warning">Edit</a>
                                  <button class="btn btn-outline-danger">Delete</button>
                                </form>
                                <!-- <a class="badge btn-outline-warning" href="{{ route('produk.destroy', $r->id) }}" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">Delete</a>
                                <form id="destroy-form" action="{{ route('produk.destroy', $r->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('delete')
                                </form> -->
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">Daftar Minuman</h4>
                    </div>
                    @if(Session::has('minum'))
                      <blockquote class="blockquote blockquote-warning">
                        <p>{{ Session('minum') }}</p>
                      </blockquote>
                    @endif
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Nama Minuman </th>
                            <th></th>
                            <th> Harga </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($minuman as $r)
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
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
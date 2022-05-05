<div class="col-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Daftar Tempat</h4>
        </div>
        @if(Session::has('tempat'))
          <blockquote class="blockquote blockquote-warning">
            <p>{{ Session('tempat') }}</p>
          </blockquote>
        @endif
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Nama Tempat </th>
                <th> Stok Meja </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tempat as $r)
                <tr>
                  <td>
                    <span class="pl-2">{{ $r->nama }}</span>
                  </td>
                  <td> {{ $r->stok }} </td>
                  <td width="30px">
                    <form method="post" action="{{ route('tempat.destroy', $r->id) }}">
                      @csrf
                      @method('delete')
                      <a href="{{ route('photoTempat.show', $r->id) }}" class="btn btn-outline-primary">Edit Foto</a>
                      <a href="{{ route('tempat.edit', $r->id) }}" class="btn btn-outline-warning">Edit</a>
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

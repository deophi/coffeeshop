<div class="col-md-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Rekening Tersedia</h4>
          <!-- <p><a href="" class="badge btn-outline-warning">Tambah</a></p> -->
        </div>
        @if(Session::has('tambah'))
          <blockquote class="blockquote blockquote-warning">
            <p>{{ Session('tambah') }}</p>
          </blockquote>
        @elseif(Session::has('hapus'))
          <blockquote class="blockquote blockquote-danger">
            <p>{{ Session('hapus') }}</p>
          </blockquote>
        @endif
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Nama Bank </th>
                <th> No Rekening </th>
                <th> Atas Nama </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rekening as $r)
                <tr>
                  <td>
                    <span class="pl-2">{{ $r->bank }}</span>
                  </td>
                  <td> {{ $r->norek }} </td>
                  <td> {{ $r->nama }} </td>
                  <td width="30px">
                    <form method="post" action="{{ route('rekening.destroy', $r->id) }}">
                      @csrf
                      @method('delete')
                      <a href="{{ route('rekening.edit', $r->id) }}" class="btn btn-outline-warning">Edit</a>
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
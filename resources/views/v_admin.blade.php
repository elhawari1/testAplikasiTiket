<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Agent X</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <h4><i class="icon fa fa-check"></i> Data Terhapus!</h4>
        {{ session('success') }}.
    </div>
    @endif

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Admin</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <form class="d-flex" role="search">
              <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
          </div>
        </div>
      </nav>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h3 class="text-center text-danger"><b>Data Pemesanan Tiket</b> </h3>
                <div class="form-group pt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">No Telepon</th>
                                <th scope="col">Status Check-in</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tiket as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>
                                    @if ($data->is_checked_in == 0)
                                    <span class="badge text-bg-danger">Belum Terpakai</span>
                                    @elseif ($data->is_checked_in == 1)
                                    <span class="badge text-bg-success">Terpakai</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($data->is_checked_in == 0)
                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                        data-bs-target="#update{{ $data->id }}">
                                        Edit
                                    </button>
                                    @endif
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $data->id }}">
                                        Hapus
                                    </button>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal update -->
    @foreach ($tiket as $data)
    <div class="modal fade" id="update{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $data->name  }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Benar Tiket Sudah Dipesan <span class="badge text-bg-warning"> {{ $data->ticket_id }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a href="/admin/tiket/update/{{ $data->id }}" class="btn btn-success">Yes</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal Delete -->
    @foreach ($tiket as $data)
    <div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $data->ticket_id  }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data <span class="badge text-bg-warning"> {{ $data->name }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a href="/admin/tiket/destroy/{{ $data->id }}" class="btn btn-danger">Yes</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>

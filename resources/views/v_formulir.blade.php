<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">


            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h3 class="text-center text-danger"><b>Formulir Pendaftaran</b> </h3>
                <div class="form-group pt-3">
                    <form action="/admin/tiket/store" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama <span
                                    style="color: red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control"
                                    placeholder="Nama Lengkap">
                                @error('name')<p class="tex text-danger">{{ $message }}</p>@enderror

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email <span
                                    style="color: red">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail3"
                                    placeholder="email@gmail.com">
                                @error('email')<p class="tex text-danger">{{ $message }}</p>@enderror

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">No Hp <span
                                    style="color: red">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" name="no_hp" class="form-control" id="inputEmail3"
                                    placeholder="No Telepon">
                                @error('no_hp')<p class="tex text-danger">{{ $message }}</p>@enderror

                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-danger text-center"
                            style="margin-left: 280px">Pesan</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
</body>

</html>

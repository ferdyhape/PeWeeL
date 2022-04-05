<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div class="card shadow my-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary fs-3"><strong>Data</strong></h6>
                <div class="d-flex">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white" href="/dashboard/product/create">Tambah product</a></button>
                        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white" href="/dashboard/cetak-product">Cetak Data product</a></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($product as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->product_name }}</td>
                            <td>{{ $p->category }}</td>
                            <td>{{ $p->price }}</td>
                            <td>{{ $p->quantity }}</td>
                            <td class="d-flex justify-content-evenly">
                                <a href="product/{{ $p->id }}" class="badge bg-success"><i class="bi bi-eye-fill" style="font-size: 18px;"></i></a>
                                <a href="product/{{ $p->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square" style="font-size: 18px;"></i></a>
                                <form action="product/{{ $p->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('beneran mau hapus?')"><i class="bi bi-trash" style="font-size: 18px;"></i></button>
                                </form>
                                <!-- <a href="product/{{ $p->id }}" class="badge bg-warning"><i class="bi bi-pencil-square" style="font-size: 18px;"></i></a> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
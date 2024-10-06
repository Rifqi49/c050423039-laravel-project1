<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4"> Laravel 11 </h3>
                    <h5 class="text-center"><a href="https://poliban.ac.id">poliban.ac.id</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-success mb-3">ADD PRODUCT</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/products/'. $product->image) }}"
                                            alt="{{ $product->image }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $product->title }}</td>
                                        <td>Rp {{ number_format($product->price,2,',','.') }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('products.show', $product->id) }}">
                                                Show
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary">
                                                Edit
                                            </a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal{{ $product->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal Delete-->
                                    @include('products.delete')
                                @empty
                                    <div class="alert alert-danger">
                                        Data Product Tidak Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if(session('success')) 
            Swal.fire({ 
                icon: "success", 
                title: "BERHASIL",
                text: "{{ session('success') }}", 
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error')) 
            Swal.fire({ 
                icon: "error", 
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>
</html>
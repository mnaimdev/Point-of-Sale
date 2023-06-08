@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="{{ route('product.create') }}" class="btn btn-primary">Add New</a>
                &nbsp;&nbsp;
                <a href="{{ route('product.import') }}" class="btn btn-info">Import</a>
                &nbsp;&nbsp;
                <a href="{{ route('product.export') }}" class="btn btn-danger">Export</a>
            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a>Product</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Product List</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $sl => $product)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $product->product_name }}</td>

                                        <td>{{ $product->rel_to_category->category_name }}</td>
                                        <td>
                                            <img width="50" height="50"
                                                src="{{ asset('/uploads/product') }}/{{ $product->product_image }}"
                                                alt="">
                                        </td>
                                        <td>
                                            <a href="{{ route('product.barcode', $product->id) }}" class="btn btn-info">Bar
                                                Code</a>

                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-primary">Edit</a>

                                            <a data-delete="{{ route('product.delete', $product->id) }}"
                                                class="btn btn-danger delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_scripts')
    <script>
        $('.delete').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this record?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var link = $(this).attr('data-delete');
                    location.href = link;
                }
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endsection

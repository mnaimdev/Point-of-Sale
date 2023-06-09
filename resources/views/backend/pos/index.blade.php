@extends('admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>POS Handle</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            <tr>
                                <td>Demo 1</td>
                                <td>
                                    <input style="border: none;" type="number" value="0" min="1">
                                </td>
                                <td>
                                    350
                                </td>
                            </tr>
                        </table>
                        <div class="bg-primary p-2">
                            <p class="text-white m-2 text-center">VAT: </p>
                            <p class="text-white m-2 text-center">Subtotal: </p>
                            <p class="text-white m-2 text-center">Total: </p>
                        </div>

                        <div class="mt-3">
                            <label>Customer</label>
                            <select name="customer_id" class="form-control">
                                <option disabled selected>-- Select Customer --</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-6">
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
                                    <th>Product Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $sl => $product)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $product->product_name }}</td>


                                        <td>
                                            <img width="50" height="50"
                                                src="{{ asset('/uploads/product') }}/{{ $product->product_image }}"
                                                alt="">
                                        </td>
                                        <td>
                                            <button class="btn btn-info">+</button>
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

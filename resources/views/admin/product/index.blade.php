@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card header">
            <h4>Product Page</h4>
            <hr>

        </div>
        <div class="card body">
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)

                    <tr>
                        <td>{{ $item->id }} </td>
                        <td>{{ $item->prod_name }} </td>
                        <td>{{ $item->description }} </td>
                        <td>
                            <img src="{{ asset('assets/uploads/products/'.$item->image }}" >
                        </td>
                        <td>{{ $item->price }} </td>
                        <td>{{ $item->weight }} </td>
                        <td>{{ $item->stock }} </td>
                        <td>
                            <a href="{{ url('edit-prod/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete-prod/'.$item->id) }}" class="btn btn-danger">Delete</a>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

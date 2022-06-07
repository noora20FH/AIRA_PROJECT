@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card header">
            <h4>Add Product</h4>
            <hr>

        </div>
        <div class="card body">
            <form action="{{url('insert-product') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label> 
                    <input type="text" class="form-control" prod_name="Name">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label> 
                    <textarea name="description" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-md-12"> 
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Price</label> 
                    <input type="number" class="form-control name="price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Weight</label> 
                    <input type="number" class="form-control name="weight">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Stock</label> 
                    <input type="number" class="form-control name="stock">
                </div>
                <div class="col-md-12"> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
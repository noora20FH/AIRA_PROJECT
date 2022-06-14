@extends('layouts.admin')

@section('content')
    <div class="card>
        <div class="card-header">
            <h4>Add Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('insert-category') }}" method="POST"> enctype="multipart/form-data">
                @csrf 
                <div class="row">
                        <div class="col-md-6"></div> 
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="col-md-6"></div> 
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug">
                        </div>

                        <div class="col-md-12"></div>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="col-md-6 mb-3"></div> 
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>

                        <div class="col-md-6 mb-3"></div> 
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular">
                        </div>

                        <div class="col-md-12 mb-3"></div> 
                            <label for="">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title">
                        </div>

                        <div class="col-md-12 mb-3"></div> 
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="col-md-12 mb-3"></div> 
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="col-md-12"></div> 
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-12"></div> 
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
        </div>
    </div>
@endsection

@extends('admin.master')

@section('title')
Add Category
@endsection
@section('body')
<div class="container my-3">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Add New Category</div>
                <div class="card-body">
                    <form action="{{ route('admin.category.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="" class="col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-3">Description</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="description">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-3">Image</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-3"></label>
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-outline-info px-3" value="Add Category">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
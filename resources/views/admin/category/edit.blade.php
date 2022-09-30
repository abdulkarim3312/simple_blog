@extends('admin.master')

@section('title')
Update {{ $category->name }}
@endsection
@section('body')
<div class="container my-3">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Update {{ $category->name }} Category</div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update',['id'=>$category->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="" class="col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-3">Description</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="description" value="{{ $category->description }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-3">Image</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="image">
                            <img src="{{ asset($category->image) }}" alt="" class="my-3" height="100" width="100">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-3"></label>
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-outline-info px-3" value="Update Category">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
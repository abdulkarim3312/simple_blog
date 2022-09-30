@extends('admin.master')

@section('title')
Add Article
@endsection
@section('body')
<div class="container my-3">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Add New Article</div>
                <div class="card-body">
                    <form action="{{ route('admin.blog.update',['id'=>$blog->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="" class="col-md-3">Article Title</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <select name="category_id" id="" class="form-control">
                                <option value="" selected disabled>-- Select Category --</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $single_category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-3">Article Image</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="image">
                            <img src="{{ asset($blog->image) }}" alt="" class="my-3" height="100" width="100">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-3">Article</label>
                        <div class="col-md-9">
                            <textarea name="article" class="form-control" cols="30" rows="5">{{ $blog->article }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-3"></label>
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-outline-info px-3" value="Update Article">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.master')

@section('title')
All Products
@endsection
@section('body')
<div class="container-fluid py-5">
    <div class="card mb-4">
        <p class="text-center text-success">{{ Session::get('message')}}</p>
        <p class="text-center text-danger">{{ Session::get('message2')}}</p>
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Existing Products
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($category->image) }}" alt="" height="100" width="100"></td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('admin.category.edit',['id'=>$category->id]) }}" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.category.delete',['id'=>$category->id]) }}" class="btn btn-outline-danger" onclick="return confirm('Are You Sure To Delete This Category?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
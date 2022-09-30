@extends('admin.master')

@section('title')
All blogs
@endsection
@section('body')
<div class="container-fluid py-5">
    <div class="card mb-4">
        <p class="text-center text-success">{{ Session::get('message')}}</p>
        <p class="text-center text-danger">{{ Session::get('message2')}}</p>
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Existing blogs
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Article Name</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($blog->image) }}" alt="" height="100" width="100"></td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->author }}</td>
                        <td>{{ $blog->category->name }}</td>
                        <td>
                            <a href="{{ route('admin.blog.edit',['id'=>$blog->id]) }}" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.blog.delete',['id'=>$blog->id]) }}" class="btn btn-outline-danger" onclick="return confirm('Are You Sure To Delete This blog?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
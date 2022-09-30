<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    private $blogs, $blog, $categories, $category;
    public function index()
    {
        $this->categories = Category::all();
        return view('admin.blog.index',['categories'=>$this->categories]);
    }
    public function manage()
    {
        $this->categories = Category::all();
        $this->blogs = Blog::all();
        return view('admin.blog.manage', ['blogs'=>$this->blogs, 
                                            'categories'=>$this->categories
                                        ]);
    }
    public function show($id)
    {
        $this->blog = Blog::find($id);
        return view('admin.blog.manage', ['blog'=>$this->blog]);
    }

    public function create(Request $request)
    {
        Blog::createBlog($request);
        return redirect('/admin/blog/manage')->with('message', 'New Blog Added Successfully');
    }
    public function edit($id)
    {   $this->categories = Category::all();
       $this->category = Category::find($id);
        $this->blog = Blog::find($id);
        return view('admin.blog.edit', ['blog'=>$this->blog,
                                        'single_category'=>$this->category,
                                        'categories'=>$this->categories
                                                                            ]);
    }
    public function update(Request $request, $id)
    {
        Blog::updateBlog($request, $id);
        return redirect('/admin/blog/manage')->with('message', 'Blog Updated Successfully');
    }
    public function delete($id)
    {
        Blog::deleteBlog($id);
        return redirect('/admin/blog/manage')->with('message2', 'Blog Deleted Successfully');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Category;

class Blog extends Model
{
    use HasFactory;
    private static $blog, $image, $imageName, $imageUrl, $directory, $extension;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$extension = self::$image->extension();
        self::$imageName = time().'.'.self::$extension;
        self::$directory = 'admin/img/blog-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function createBlog($request)
    {
        self::$blog = new Blog();
        self::$blog->title = $request->title;
        self::$blog->category_id = $request->category_id;
        self::$blog->author = Auth::user()->name;
        self::$blog->article = $request->article;
        self::$blog->image = self::getImageUrl($request);
        self::$blog->save();
    }
    public static function updateBlog($request, $id)
    {
        self::$blog = Blog::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$blog->image))
            {
                unlink(self::$blog->image);
                self::$imageUrl = self::getImageUrl($request);
            }
        }
        else
        {
            self::$imageUrl = self::$blog->image;
        }
        self::$blog->title = $request->title;
        self::$blog->category_id = $request->category_id;
        self::$blog->article = $request->article;
        self::$blog->image = self::$imageUrl;
        self::$blog->save();
    }
    public static function deleteBlog($id)
    {
        self::$blog = Blog::find($id);
        if(file_exists(self::$blog->image))
            {
                unlink(self::$blog->image);
            }
        self::$blog->delete();
    }
    public function category()
    {
       return $this->belongsTo(Category::class);
    }
}

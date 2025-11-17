<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Seo;

class BlogController extends Controller
{

    // admin functionlaity
    // List all blogs
    public function index()
    {
        $blogs = Blog::with('seo')->latest()->get();
        $categories = Category::all();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

  public function store(Request $request)
{
    $request->validate([
        'title'          => 'required|string|max:255',
        'content'        => 'required',
        'category_ids'   => 'required|array',
        'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Ensure category_ids are integers
    $categoryIds = array_map('intval', $request->category_ids);

    // Save SEO first
    $seo = Seo::create([
        'meta_title'       => $request->seo_title ?? $request->title,
        'meta_description' => $request->seo_meta ?? Str::limit(strip_tags($request->content), 150),
        'tags'             => $request->seo_tags ?? null,
    ]);

    // Handle image upload
    $imagePath = null;
    if ($request->hasFile('featured_image')) {
        $file = $request->file('featured_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/blogs'), $filename);
        $imagePath = 'uploads/blogs/' . $filename;
    }

    // Save Blog
    Blog::create([
        'title'          => $request->title,
        'slug'           => $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->title),
        'excerpt'        => $request->excerpt ?? Str::limit(strip_tags($request->content), 120),
        'content'        => $request->content,
        'category_ids'   => $categoryIds, // ✅ sanitized
        'featured_image' => $imagePath,
        'seo_id'         => $seo->id,
        'status'         => $request->status ?? 'active',
        'published_at'   => $request->published_at ?? now(),
        'user_id'        => auth()->id() ?? 1,
    ]);

    return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
}


    // Show edit form
    public function edit($id)
    {
        $blog = Blog::with('seo')->findOrFail($id);
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    // Update blog
    public function update(Request $request, $id)
    {
        $blog = Blog::with('seo')->findOrFail($id);

        $request->validate([
            'title'          => 'required|string|max:255',
            'content'        => 'required',
            'category_ids'   => 'required|array',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
            $categoryIds = array_map('intval', $request->category_ids);


        // Update SEO
        if ($blog->seo) {
            $blog->seo->update([
                'meta_title'       => $request->seo_title ?? $request->title,
                'meta_description' => $request->seo_meta ?? Str::limit(strip_tags($request->content), 150),
                'tags'             => $request->seo_tags ?? null,
            ]);
        } else {
            $seo = Seo::create([
                'meta_title'       => $request->seo_title ?? $request->title,
                'meta_description' => $request->seo_meta ?? Str::limit(strip_tags($request->content), 150),
                'tags'             => $request->seo_tags ?? null,
            ]);
            $blog->seo_id = $seo->id;
        }

        // Handle image replacement
        if ($request->hasFile('featured_image')) {
            // delete old
            if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
                unlink(public_path($blog->featured_image));
            }
            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $blog->featured_image = 'uploads/blogs/' . $filename;
        }

        // Update Blog
        $blog->update([
            'title'        => $request->title,
            'slug'         => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'excerpt'      => $request->excerpt ?? Str::limit(strip_tags($request->content), 120),
            'content'      => $request->content,
            'category_ids' => $categoryIds, // ✅ sanitized
            'status'       => $request->status ?? 'active',
            'published_at' => $request->published_at ?? now(),
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete image from public/uploads/blogs
        if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
            unlink(public_path($blog->featured_image));
        }

        // Delete SEO record if exists
        if ($blog->seo) {
            $blog->seo->delete();
        }

        // Delete Blog
        $blog->delete();

        return back()->with('success', 'Blog deleted successfully!');
    }


    // Show single blog
    public static function showBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->with('seo')->firstOrFail();
        $recentBlogs = Blog::latest()->take(3)->get();
         $categories = Category::all()->map(function ($category) {
            $count = Blog::whereJsonContains('category_ids', $category->id)->count();
            $category->blogs_count = $count;
            return $category;
        });
        return view('guest.blogDetail', compact('blog', 'categories', 'recentBlogs'));
    }
    // show all blogs
    public function show(Request $request)
    {
        $query = Blog::with('seo')->latest();

        // Filter by category
        if ($request->has('category')) {
            $categoryId = $request->category;
            $query->whereJsonContains('category_ids', (int) $categoryId);
        }

        // Filter by search
        if ($request->has('s')) {
            $search = $request->s;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('content', 'like', "%$search%");
            });
        }

        $blogs = $query->paginate(10);
        $recentBlogs = Blog::latest()->take(3)->get();

        // All categories with blog count
        $categories = Category::all()->map(function ($category) {
            $count = Blog::whereJsonContains('category_ids', $category->id)->count();
            $category->blogs_count = $count;
            return $category;
        });

        return view('guest.blogs', compact('blogs', 'categories', 'recentBlogs'));
    }
}

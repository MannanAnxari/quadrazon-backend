<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Resources\BlogResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with('category')->latest();

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        if ($request->has('category_id')) {
            $categoryIds = explode(',', $request->category_id);
            $query->whereIn('category_id', $categoryIds);
        }

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('content', 'LIKE', "%{$searchTerm}%");
            });
        }

        // if ($request->has('start_date') && $request->has('end_date')) {
        //     $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        // }

        if ($request->has('start_date') || $request->has('end_date')) {
            if ($request->has('start_date')) {
                $startDate = $request->start_date . ' 00:00:00';
                $query->where('created_at', '>=', $startDate);
            }


            if ($request->has('end_date')) {
                $endDate = $request->end_date . ' 23:59:59';
                $query->where('created_at', '<=', $endDate);
            }
        }

        $blogs = $query->paginate($request->input('per_page', 10));
        return BlogResource::collection($blogs);
    }

    public function show($blog)
    {

        $blog = Blog::where('slug', $blog)->first();
        // return $blog;

        return new BlogResource($blog);
    }

    public function _store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:blog,case_study',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('blogs'), $filename);

            $validatedData['image'] = 'blogs/' . $filename;
        }

        $blog = Blog::create($validatedData);
        return new BlogResource($blog);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'blogs' => 'required|array',
            'blogs.*.title' => 'required|max:255',
            'blogs.*.content' => 'required',
            'blogs.*.category_id' => 'required|exists:categories,id',
            'blogs.*.type' => 'required|in:blog,case_study',
            'blogs.*.image' => 'nullable|url',
        ]);

        $blogs = $validatedData['blogs'];
        $createdBlogs = [];

        foreach ($blogs as $blogData) {
            if (!empty($blogData['image'])) {
                try {
                    $response = Http::get($blogData['image']);
                    if ($response->successful()) {
                        $extension = Str::afterLast(parse_url($blogData['image'], PHP_URL_PATH), '.');
                        $filename = time() . '_' . Str::random(10) . '.' . $extension;
                        $path = public_path('blogs/' . $filename);

                        file_put_contents($path, $response->body());

                        $blogData['image'] = 'blogs/' . $filename;
                    } else {
                        $blogData['image'] = null;
                    }
                } catch (\Exception $e) {
                    $blogData['image'] = null;
                }
            }
            $createdBlogs[] = Blog::create($blogData);
        }

        return BlogResource::collection($createdBlogs);
    }

    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:blog,case_study',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                if (file_exists(public_path($blog->image))) {
                    unlink(public_path($blog->image));
                }
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('blogs'), $filename);

            $validatedData['image'] = 'blogs/' . $filename;
        }

        $blog->update($validatedData);
        return new BlogResource($blog);
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            if (file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
        }
        $blog->delete();
        return response()->json(null, 204);
    }
}

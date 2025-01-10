<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $categories = Category::where('context', 'portfolio')->get();
        return view('admin.portfolios.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('portfolios'), $filename);

            $data['image'] = 'portfolios/' . $filename;
        }

        $data['tags'] = $request->tags ? json_encode($request->tags) : null;

        Portfolio::create($data);
        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio item created successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = Category::where('context', 'portfolio')->get();
        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                if (file_exists(public_path($portfolio->image))) {
                    unlink(public_path($portfolio->image));
                }
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('portfolios'), $filename);

            $data['image'] = 'portfolios/' . $filename;
        }

        $data['tags'] = $request->tags ? json_encode($request->tags) : null;

        $portfolio->update($data);
        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio item updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            if (file_exists(public_path($portfolio->image))) {
                unlink(public_path($portfolio->image));
            }
        }
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio item deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Http\Resources\PortfolioResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->paginate(10);
        return PortfolioResource::collection($portfolios);
    }

    public function show(Portfolio $portfolio)
    {
        return new PortfolioResource($portfolio);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('portfolios'), $filename);

            $validatedData['image'] = 'portfolios/' . $filename;
        }

        $portfolio = Portfolio::create($validatedData);
        return new PortfolioResource($portfolio);
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                if (file_exists(public_path($portfolio->image))) {
                    unlink(public_path($portfolio->image));
                }
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('portfolios'), $filename);

            $validatedData['image'] = 'portfolios/' . $filename;
        }

        $portfolio->update($validatedData);
        return new PortfolioResource($portfolio);
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            if (file_exists(public_path($portfolio->image))) {
                unlink(public_path($portfolio->image));
            }
        }
        $portfolio->delete();
        return response()->json(null, 204);
    }
}

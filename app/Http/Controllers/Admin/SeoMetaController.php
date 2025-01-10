<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoMeta;
use Illuminate\Http\Request;

class SeoMetaController extends Controller
{
    public function index()
    {
        $metaSettings = SeoMeta::all();
        return view('admin.seo_metas.index', compact('metaSettings'));
    }

    public function edit($id)
    {
        $metaSetting = SeoMeta::findOrFail($id);
        return view('admin.seo_metas.edit', compact('metaSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|array|max:255',
            // 'route' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            // 'description' => 'nullable|string|max:500',
        ]);

        $metaSetting = SeoMeta::findOrFail($id);

        $metaSetting->update([
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => implode(", ", $request->meta_keywords),
            'title' => $request->title,
            // 'description' => $request->description,
        ]);

        return redirect()->route('admin.seo-metas.index')->with('success', 'Meta settings updated successfully!');
    }
}

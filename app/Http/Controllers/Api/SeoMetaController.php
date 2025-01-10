<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SeoMeta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SeoMetaController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => SeoMeta::all()
        ]);
    }
}

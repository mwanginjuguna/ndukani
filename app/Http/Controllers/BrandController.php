<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();
        $brands = Brand::all();

        return response()->json([
            'success' => true,
            'data' => [
                'categories' => $categories,
                "brands" => $brands
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Brand $brand
     * @return JsonResponse
     */
    public function show(Brand $brand): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $brand,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        //dd($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'nullable',
        ]);

        $brand = Brand::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Brand created successfully!',
            'data' => $brand,
        ]);
    }
}

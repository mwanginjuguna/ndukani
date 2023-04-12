<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $tags = Tag::all();

        return response()->json([
            'success' => true,
            'data' => $tags,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return JsonResponse
     */
    public function show(Tag $tag): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $tag,
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
        ]);

        $tag = Tag::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Tag created successfully!',
            'data' => $tag,
        ]);
    }
}

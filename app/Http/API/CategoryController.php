<?php

namespace App\Http\API;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        $category = $this->categoryService->getAllCategory();
        return response()->json($category);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('imagesCategory', 'public');
        }

        try {
            $course = $this->categoryService->createCategory([
                'name' => $request->name,
                'code' => $request->code,
                'image' => $imagePath,
            ]);
            return response()->json($course, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $course = $this->categoryService->findByIdCategory($id);
            return response()->json($course);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }


    public function update(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('imagesCategory', 'public');
        }

        try {
            $course = $this->categoryService->updateCategory($id, [
                'name' => $request->name,
                'code' => $request->code,
                'image' => $imagePath,
            ]);
            return response()->json($course);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->categoryService->deleteCategory($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
}

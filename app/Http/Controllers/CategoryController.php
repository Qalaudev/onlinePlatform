<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\InterfaceCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(InterfaceCategoryRepository $interfaceCategoryRepository)
    {
        $this->categoryRepository = $interfaceCategoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAllCategory();
        return view('category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('imagesCategory', 'public');
        }

        try {
            $this->categoryRepository->createCategory([
                'name' => $request->name,
                'code' => $request->code,
                'image' => $imagePath,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function show(int $id)
    {
        $category = $this->categoryRepository->getByIdCategory($id);
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $category->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('imagesCategory', 'public');
        }

        try {
            $this->categoryRepository->updateCategory($category->id,
                [
                'name' => $request->name,
                'code' => $request->code,
                'image' => $imagePath,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        try {
            $this->categoryRepository->deleteCategory($category->id);
            return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}

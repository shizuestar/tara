<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query()->orderBy('created_at', 'desc');

        if ($keyword = $request->input('keyword')) {
            $query->search($keyword);
        }

        $categories = $query->paginate(6);

        return view('administrator.admin.category.index', compact('categories', 'keyword'));
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('admin.categories.index')->with('success', 'Kategori baru ditambahkan.');
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('admin.categories.index')->with('success', 'Kategori diperbarui.');
    }

    public function destroy(Category $category)
    {
        if ($category->blogs()->exists()) {
            return redirect()->route('admin.categories.index')->with('error', 'Kategori masih digunakan oleh blog.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Kategori dihapus.');
    }
}